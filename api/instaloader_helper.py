import instaloader
import json
import sys
import datetime
import re

def extract_shortcode_from_url(url):
    """Extracts shortcode from Instagram post, reel, or TV URL."""
    match = re.search(r"/(?:p|reel|tv)/([a-zA-Z0-9_-]+)", url)
    if match:
        return match.group(1)
    return None

def extract_username_from_url(url):
    """Extracts username from Instagram profile URL."""
    # Ensure it's a profile URL and not a content URL or other paths
    match = re.search(r"instagram\.com/([a-zA-Z0-9_.]+)(?:/\?|$)", url)
    if match:
        username = match.group(1)
        # Avoid matching keywords for content types as usernames
        if username not in ['p', 'reel', 'tv', 'stories']:
            return username
    return None

def get_post_data(L, shortcode):
    """Fetches and structures data for a given post shortcode."""
    try:
        post = instaloader.Post.from_shortcode(L.context, shortcode)

        post_data = {
            "type": None,
            "url": None,
            "thumbnail_url": post.url, # Default thumbnail
            "caption": post.caption,
            "username": post.owner_username,
            "profile_picture": None, # Will attempt to fetch
            "timestamp": int(post.date_utc.timestamp()),
            "likes": post.likes,
            "comments": post.comments,
            "shortcode": post.shortcode,
            "items": []
        }

        if post.typename == 'GraphSidecar':
            post_data["type"] = "carousel"
            # For carousel, top-level url and thumbnail_url can be from the first item
            first_node = True
            for node in post.get_sidecar_nodes():
                item = {
                    "type": "image",
                    "url": node.display_url,
                    "thumbnail_url": node.display_url 
                }
                if node.is_video:
                    item["type"] = "video"
                    item["url"] = node.video_url

                if first_node:
                    post_data["url"] = item["url"] # Set main URL to first item's URL
                    post_data["thumbnail_url"] = item["thumbnail_url"] # Set main thumbnail
                    first_node = False
                post_data["items"].append(item)
        elif post.is_video:
            post_data["type"] = "video"
            post_data["url"] = post.video_url
            post_data["thumbnail_url"] = post.url # Video thumbnail
        else:
            post_data["type"] = "image"
            post_data["url"] = post.url
            post_data["thumbnail_url"] = post.url # Image is its own thumbnail

        # Attempt to get owner's profile picture
        try:
            if post.owner_profile: # owner_profile might trigger a fetch
                 post_data["profile_picture"] = post.owner_profile.profile_pic_url
        except instaloader.exceptions.ProfileNotExistsException:
            post_data["profile_picture"] = None # Owner profile might be private or non-existent
        except Exception: # Catch any other potential errors during profile pic fetch
            post_data["profile_picture"] = None


        return post_data

    except instaloader.exceptions.InstaloaderException as e:
        return {"error": f"InstaloaderException fetching post: {str(e)}", "error_type": type(e).__name__}
    except Exception as e:
        return {"error": f"Generic error fetching post: {str(e)}", "error_type": type(e).__name__}


def get_profile_data(L, username):
    """Fetches and structures data for a given username."""
    try:
        profile = instaloader.Profile.from_username(L.context, username)

        profile_data = {
            "is_profile": True,
            "username": profile.username,
            "profile_picture": profile.profile_pic_url,
            "bio": profile.biography,
            "posts_count": profile.mediacount,
            "followers_count": profile.followers,
            "following_count": profile.followees,
            "recent_posts": []
        }

        # Fetch recent posts (limit to 12 for performance)
        count = 0
        for post in profile.get_posts():
            if count >= 12:
                break

            post_item = {
                "shortcode": post.shortcode,
                "url": f"https://www.instagram.com/p/{post.shortcode}/",
                "thumbnail_url": post.url, # Default thumbnail
                "is_video": post.is_video,
                "type": "video" if post.is_video else "image",
                "likes": post.likes,
                "comments": post.comments,
                "caption": post.caption,
                "timestamp": int(post.date_utc.timestamp())
            }
            if post.is_video:
                post_item["video_url"] = post.video_url # Specific video URL

            profile_data["recent_posts"].append(post_item)
            count += 1

        return profile_data

    except instaloader.exceptions.ProfileNotExistsException:
        return {"error": f"Profile @{username} not found.", "error_type": "ProfileNotExistsException"}
    except instaloader.exceptions.InstaloaderException as e:
        return {"error": f"InstaloaderException fetching profile: {str(e)}", "error_type": type(e).__name__}
    except Exception as e:
        return {"error": f"Generic error fetching profile: {str(e)}", "error_type": type(e).__name__}

def main():
    if len(sys.argv) < 2:
        print(json.dumps({"error": "Instagram URL not provided."}))
        sys.exit(1)

    url = sys.argv[1]
    L = instaloader.Instaloader(
        user_agent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36",
        # QUIET MODE: Suppress informational messages from Instaloader to keep stdout clean for JSON
        quiet=True, 
        # Optional: Download nothing, only fetch metadata
        download_pictures=False,
        download_videos=False,
        download_video_thumbnails=False,
        download_geotags=False,
        download_comments=False,
        save_metadata=False,
        compress_json=False 
    )

    # Optional: Login (if session file is available and configured)
    # try:
    #     L.load_session_from_file("your_username") # Replace your_username or handle dynamically
    # except Exception as e:
    # pass # Proceed without login if session loading fails

    result = {}
    shortcode = extract_shortcode_from_url(url)
    username = extract_username_from_url(url)

    if shortcode:
        result = get_post_data(L, shortcode)
    elif username:
        result = get_profile_data(L, username)
    else:
        # Could add story/IGTV specific regex here if needed in future
        result = {"error": "Invalid or unsupported Instagram URL format."}

    print(json.dumps(result, indent=None, separators=(',', ':'))) # Compact JSON

if __name__ == "__main__":
    main()
