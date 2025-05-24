// Global variable to store the selected content type
window.selectedContentType = 'video'; // Default content type

// Function to update the placeholder of the URL input field
function updatePlaceholder(contentType) {
    var placeholderText = 'Enter Instagram URL'; // Generic default
    if (contentType) {
        var typeName = contentType.charAt(0).toUpperCase() + contentType.slice(1);
        if (contentType === 'photo') typeName = 'Photo'; // Ensure correct casing if needed
        else if (contentType === 'reels') typeName = 'Reels';
        else if (contentType === 'story') typeName = 'Story';
        else if (contentType === 'igtv') typeName = 'IGTV';
        else if (contentType === 'carousel') typeName = 'Carousel';
        else if (contentType === 'profile') typeName = 'Profile';
        placeholderText = 'Enter Instagram ' + typeName + ' URL';
    }
    $('#instagram-url').attr('placeholder', placeholderText);
}

$(document).ready(function() {
    // Initialize placeholder based on the initially active tab on index.php
    if ($('#instagram-form').length) { // Check if we are on a page with the main form
        var initialActiveTab = $('.tab-button.active').first();
        if (initialActiveTab.length) {
            window.selectedContentType = initialActiveTab.data('type') || 'video';
        }
        updatePlaceholder(window.selectedContentType);
    }

    // Correct form submission handler that calls fetchContent
    $('#instagram-form').submit(function(e) {
        e.preventDefault();
        var url = $('#instagram-url').val();
        fetchContent(url, window.selectedContentType); // Pass selectedContentType
    });

    // Handler for the copy button
    $('#copy-btn').click(function() {
        var url = $('#instagram-url').val();
        copyToClipboard(url);
    });

    // Handler for the "post" button
    $('#post-btn').click(function() {
        var url = $('#instagram-url').val();
        shareContent(url);
    });

    // Handler for tab buttons
    $('.tab-button').click(function(e) {
        // Only apply special logic if on a page with the main instagram form
        if ($('#instagram-form').length) {
            e.preventDefault(); // Stop navigation
            
            $('.tab-button').removeClass('active');
            $(this).addClass('active');

            var contentType = $(this).data('type');
            window.selectedContentType = contentType; // Update global variable
            updatePlaceholder(contentType); // Update placeholder
            
            console.log('Selected content type (index.php):', contentType);
            // Clear previous previews when tab changes
            $('#content-preview').empty();
            $('#profile-preview').empty();
        } else {
            // For other pages (video.php, photo.php etc.), let the default navigation happen
            // Active class will be set by PHP based on current page.
            // However, if these are single-page app style tabs, more logic would be needed here.
            // For now, assuming they navigate.
            console.log('Selected content type (other page):', $(this).data('type'));
        }
    });

    // Handler for the paste button
    $('#paste-btn').click(function() {
        navigator.clipboard.readText().then(function(text) {
            $('#instagram-url').val(text);
        }).catch(function(err) {
            console.error('Failed to read clipboard contents: ', err);
            showToast('Failed to paste from clipboard. Please check permissions.');
        });
    });
});

// Modified fetchContent to accept contentType
function fetchContent(url, contentType) {
    $('#content-preview').html('<div class="text-center"><i class="fas fa-spinner fa-spin fa-3x"></i></div>');
    $('#profile-preview').empty();

    $.ajax({
        url: 'api/fetch_content.php',
        method: 'POST',
        data: { url: url, contentType: contentType }, // Add contentType to data
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                displayContentPreview(response.data);
                if (response.data.is_profile) {
                    displayProfilePreview(response.data);
                }
            } else {
                $('#content-preview').html('<div class="alert alert-danger">' + response.message + '</div>');
            }
        },
        error: function() {
            $('#content-preview').html('<div class="alert alert-danger">Error fetching content. Please try again.</div>');
        }
    });
}

function displayContentPreview(data) {
    var html = '<h3>Content Preview</h3>';
    if (data.is_profile) { // Check if it's profile data
        // For profiles, the main "content" might be different or not applicable in this section
        // Or we might want to display a summary here as well, or indicate to check the profile tab.
        // For now, let's assume profile data will be primarily handled by displayProfilePreview.
        // This function might need adjustment based on how profile "content" should be shown in this preview area.
        // Based on current API, profile data has 'is_profile: true' and not 'type'.
        // Let's assume 'content-preview' is for posts/reels.
        // If data.type is not set (e.g. for profile data), we should handle it.
        if (data.type === 'image') {
            html += '<img src="' + data.url + '" alt="Instagram Image" class="img-fluid">';
            html += '<p class="mt-3">' + (data.caption || '') + '</p>'; // Ensure caption is not undefined
            html += '<button class="btn btn-primary mt-3" onclick="downloadContent(\'' + data.url + '\')">Download</button>';
        } else if (data.type === 'video') {
            html += '<video src="' + data.url + '" controls class="img-fluid"></video>';
            html += '<p class="mt-3">' + (data.caption || '') + '</p>'; // Ensure caption is not undefined
            html += '<button class="btn btn-primary mt-3" onclick="downloadContent(\'' + data.url + '\')">Download</button>';
        } else if (data.type === 'carousel') {
             // For carousels, we might show the first item or a more complex preview.
             // For simplicity, let's show the caption and a download button for the carousel (which downloads first item).
            if (data.items && data.items.length > 0) {
                var firstItem = data.items[0];
                if(firstItem.type === 'image') {
                    html += '<img src="' + firstItem.url + '" alt="Instagram Carousel Image" class="img-fluid">';
                } else if (firstItem.type === 'video') {
                    html += '<video src="' + firstItem.url + '" controls class="img-fluid"></video>';
                }
            }
            html += '<p class="mt-3">' + (data.caption || '') + '</p>';
             // The downloadContent function in PHP already handles carousels by downloading the first item
             // if the main URL of the carousel is passed.
             // However, the `downloadContent` JS function is called with a specific media URL.
             // For carousels, the `data.url` might not be set in the mock.
             // Let's assume download button for carousel uses the original input URL.
            html += '<button class="btn btn-primary mt-3" onclick="downloadContent(\'' + $('#instagram-url').val() + '\')">Download Carousel (first item)</button>';
        } else if (!data.is_profile) {
             html += '<div class="alert alert-warning">Unsupported content type or data format for preview.</div>';
        }
        // If it is a profile, this section will be cleared by the profile preview logic later
        // or we can explicitly clear it if no specific post content.
        // For now, if it's a profile, this specific preview might show nothing or a message.
        // The requirement is to display content preview, and profile data is displayed in displayProfilePreview.
        // So, if it is_profile, this function should probably not try to display post-specific things.
        if (data.is_profile) {
            html = '<h3>Profile Data Loaded</h3><p>See profile details below or in the profile tab.</p>';
        }

    } else if (data.type === 'image') {
        html += '<img src="' + data.url + '" alt="Instagram Image" class="img-fluid">';
        html += '<p class="mt-3">' + (data.caption || '') + '</p>';
        html += '<button class="btn btn-primary mt-3" onclick="downloadContent(\'' + data.url + '\')">Download</button>';
    } else if (data.type === 'video') {
        html += '<video src="' + data.url + '" controls class="img-fluid"></video>';
        html += '<p class="mt-3">' + (data.caption || '') + '</p>';
        html += '<button class="btn btn-primary mt-3" onclick="downloadContent(\'' + data.url + '\')">Download</button>';
    } else if (data.type === 'carousel') {
        if (data.items && data.items.length > 0) {
            var firstItem = data.items[0];
            if(firstItem.type === 'image') {
                html += '<img src="' + firstItem.url + '" alt="Instagram Carousel Image" class="img-fluid">';
            } else if (firstItem.type === 'video') {
                html += '<video src="' + firstItem.url + '" controls class="img-fluid"></video>';
            }
        }
        html += '<p class="mt-3">' + (data.caption || '') + '</p>';
        // Pass the original input URL for carousel download, as download.php expects the main post URL for carousels.
        html += '<button class="btn btn-primary mt-3" onclick="downloadContent(\'' + $('#instagram-url').val() + '\')">Download Carousel</button>';
    } else {
        // This case handles where data is not a profile, and not image/video/carousel.
        // Could be an error in data structure or an unsupported type.
        html += '<div class="alert alert-warning">Preview for this content type is not available.</div>';
        // If there's a generic download URL provided by API for unknown types, that could be used.
        // For now, assume download is only for known types.
    }
    $('#content-preview').html(html);
}

function displayProfilePreview(data) {
    var html = '<div class="profile-header">';
    html += '<img src="' + data.profile_picture + '" alt="Profile Picture" class="profile-picture">';
    html += '<div class="profile-info">';
    html += '<h2>' + data.username + '</h2>';
    html += '<p>' + (data.bio || '') + '</p>'; // Ensure bio is not undefined
    html += '</div></div>';
    html += '<div class="profile-stats">';
    // Use *_count fields as per API mock data
    html += '<div class="stat-item"><div class="stat-value">' + (data.posts_count !== undefined ? data.posts_count : (data.posts !== undefined ? data.posts : 0)) + '</div><div>Posts</div></div>';
    html += '<div class="stat-item"><div class="stat-value">' + (data.followers_count !== undefined ? data.followers_count : (data.followers !== undefined ? data.followers : 0)) + '</div><div>Followers</div></div>';
    html += '<div class="stat-item"><div class="stat-value">' + (data.following_count !== undefined ? data.following_count : (data.following !== undefined ? data.following : 0)) + '</div><div>Following</div></div>';
    html += '</div>';
    
    if (data.recent_posts && data.recent_posts.length > 0) {
        html += '<h3>Recent Posts</h3><div class="media-grid">';
        data.recent_posts.forEach(function(post) {
            html += '<div class="media-item">';
            if (post.thumbnail) { // Check if thumbnail exists
                if (post.type === 'image') {
                    html += '<img src="' + post.thumbnail + '" alt="Post thumbnail">';
                } else if (post.type === 'video') {
                    // For video thumbnails, often they are images. If it's a video URL, use a <video> tag.
                    // Assuming post.thumbnail is an image URL.
                    html += '<img src="' + post.thumbnail + '" alt="Video thumbnail">';
                    // Or if you want a playable mini-video:
                    // html += '<video src="' + post.url + '" poster="' + post.thumbnail + '" width="100" height="100"></video>';
                } else {
                     html += '<img src="' + post.thumbnail + '" alt="Media thumbnail">'; // Fallback for other types if thumbnail present
                }
            } else {
                html += '<div class="media-placeholder">No preview</div>';
            }
            html += '<div class="media-overlay">';
            html += '<span><i class="fas fa-heart"></i> ' + (post.likes !== undefined ? post.likes : 0) + '</span>';
            html += '<span><i class="fas fa-comment"></i> ' + (post.comments !== undefined ? post.comments : 0) + '</span>';
            html += '</div></div>';
        });
        html += '</div>';
    }
    $('#profile-preview').html(html);
}

function downloadContent(url) {
    // The URL passed here should be the one that download.php can process.
    // For individual images/videos, it's their direct URL.
    // For carousels, it's the main post URL (e.g., /p/...).
    window.location.href = 'download.php?url=' + encodeURIComponent(url);
}

function copyToClipboard(text) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(text).select();
    document.execCommand("copy");
    $temp.remove();
    showToast('Link copied to clipboard!');
}

function shareContent(url) {
    if (navigator.share) {
        navigator.share({
            title: 'Check out this Instagram content',
            url: url
        }).then(() => {
            showToast('Thanks for sharing!');
        }).catch(function(err) {
            console.error('Share failed:', err);
            // Fallback to copy if share API fails or is not supported
            showToast('Sharing failed, copied to clipboard instead.');
            copyToClipboard(url);
        });
    } else {
        // Fallback for browsers that do not support navigator.share
        showToast('Sharing not supported, copied to clipboard instead.');
        copyToClipboard(url);
    }
}

function showToast(message) {
    var toast = $('<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">')
        .append($('<div class="toast-body">').text(message));

    // Ensure there's a container for toasts in your HTML, e.g., <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 11"></div>
    if ($('.toast-container').length === 0) {
        $('body').append('<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1100"></div>');
    }
    $('.toast-container').append(toast);
    
    // Initialize and show the toast. Using Bootstrap 5's Toast class.
    var bsToast = new bootstrap.Toast(toast[0], { delay: 3000 });
    bsToast.show();

    // Remove the toast element from DOM after it's hidden
    toast.on('hidden.bs.toast', function () {
        $(this).remove();
    });
}