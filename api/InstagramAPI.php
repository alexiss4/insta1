<?php
class InstagramAPI {
    private $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36';

    public function getMediaInfo($url, $contentType = null) {
        return $this->getMockDataByUrl($url, $contentType);
    }

    private function getMockDataByUrl($url, $contentType = null) {
        // TODO: Consider using $contentType as a hint if URL matching is ambiguous
        // Check for post or reel URLs
        if (preg_match('/instagram.com\/(p|reel)\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
            // For simplicity, let's return an image post by default.
            // We can add logic to cycle or use $matches[2] (the media ID) to vary responses.
            // To cycle, we could use a static variable or a session variable.
            // For now, just one type of post.
            $postType = crc32($matches[2]) % 3; // Simple way to get different types based on ID

            if ($postType == 0) {
                return [
                    'type' => 'image',
                    'url' => 'https://via.placeholder.com/600x400.png?text=Mock+Image',
                    'caption' => 'This is a mock image post for ID: ' . $matches[2],
                    'username' => 'mockuser',
                    'profile_picture' => 'https://via.placeholder.com/50x50.png?text=User'
                ];
            } elseif ($postType == 1) {
                return [
                    'type' => 'video',
                    'url' => 'https://www.w3schools.com/html/mov_bbb.mp4',
                    'thumbnail' => 'https://via.placeholder.com/600x400.png?text=Mock+Video+Thumb',
                    'caption' => 'This is a mock video post for ID: ' . $matches[2],
                    'username' => 'mockuser',
                    'profile_picture' => 'https://via.placeholder.com/50x50.png?text=User'
                ];
            } else {
                return [
                    'type' => 'carousel',
                    'items' => [
                        ['type' => 'image', 'url' => 'https://via.placeholder.com/600x400.png?text=Carousel+1'],
                        ['type' => 'video', 'url' => 'https://www.w3schools.com/html/mov_bbb.mp4', 'thumbnail' => 'https://via.placeholder.com/600x400.png?text=Carousel+Video+Thumb']
                    ],
                    'caption' => 'This is a mock carousel post for ID: ' . $matches[2],
                    'username' => 'mockuser',
                    'profile_picture' => 'https://via.placeholder.com/50x50.png?text=User'
                ];
            }
        }
        // Check for story URLs
        elseif (preg_match('/instagram.com\/stories\/([a-zA-Z0-9_.]+)\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
            return [
                'type' => 'image', // Changed from 'story' to 'image' for frontend compatibility
                'url' => 'https://via.placeholder.com/1080x1920.png?text=Mock+Story+' . $matches[2],
                'thumbnail_url' => 'https://via.placeholder.com/200x355.png?text=StoryThumb+' . $matches[2],
                'caption' => 'This is a mock story from user ' . $matches[1] . ' with ID: ' . $matches[2],
                'username' => $matches[1],
                'profile_picture' => 'https://via.placeholder.com/50x50.png?text=User',
                'timestamp' => time() - rand(0, 3600*23)
            ];
        }
        // Check for IGTV URLs
        elseif (preg_match('/instagram.com\/tv\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
            return [
                'type' => 'video', // Changed from 'igtv' to 'video' for frontend compatibility
                'url' => 'https://www.w3schools.com/html/mov_bbb.mp4',
                'thumbnail_url' => 'https://via.placeholder.com/480x854.png?text=Mock+IGTV+' . $matches[1],
                'caption' => 'This is a mock IGTV video with ID: ' . $matches[1],
                'title' => 'Mock IGTV Title - ' . $matches[1],
                'username' => 'mockuser_igtv',
                'profile_picture' => 'https://via.placeholder.com/50x50.png?text=User'
            ];
        }
        // Check for profile URLs (basic check, might need refinement)
        elseif (preg_match('/instagram.com\/([a-zA-Z0-9_.]+)\/?$/', $url, $matches)) {
            $username = $matches[1];
            // Avoid matching /p/, /reel/, /stories/ or /tv/ as profiles
            if ($username === 'p' || $username === 'reel' || $username === 'stories' || $username === 'tv') {
                return ['error' => 'Invalid URL format or conflict with specific content type.'];
            }
            return [
                'is_profile' => true,
                'username' => $username,
                'profile_picture' => 'https://via.placeholder.com/150x150.png?text=' . urlencode($username),
                'bio' => 'This is a mock user profile for ' . $username . '.',
                'posts_count' => crc32($username) % 500, // Vary data based on username
                'followers_count' => crc32($username) % 5000,
                'following_count' => crc32($username) % 1000,
                'recent_posts' => [
                    [
                        'type' => 'image',
                        'thumbnail' => 'https://via.placeholder.com/200x200.png?text=Post+1',
                        'url' => 'https://via.placeholder.com/600x400.png?text=Mock+Image+Post+1+for+' . $username,
                        'likes' => 10,
                        'comments' => 2
                    ],
                    [
                        'type' => 'video',
                        'thumbnail' => 'https://via.placeholder.com/200x200.png?text=Video+Post+2',
                        'url' => 'https://www.w3schools.com/html/mov_bbb.mp4',
                        'likes' => 15,
                        'comments' => 5
                    ]
                ]
            ];
        }

        return ['error' => 'Invalid or unsupported Instagram URL.'];
    }

    // The old methods getMediaIdFromUrl, fetchJsonData, and parseJsonData are no longer needed
    // as we are generating mock data directly.
    // We can remove them to keep the class clean.
}