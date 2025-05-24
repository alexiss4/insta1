$(document).ready(function() {
    $('#instagram-form').submit(function(e) {
        e.preventDefault();
        var url = $('#instagram-url').val();
        fetchContent(url);
    });

    $('#copy-btn').click(function() {
        var url = $('#instagram-url').val();
        copyToClipboard(url);
    });

    $('#post-btn').click(function() {
        var url = $('#instagram-url').val();
        shareContent(url);
    });
});

function fetchContent(url) {
    $('#content-preview').html('<div class="text-center"><i class="fas fa-spinner fa-spin fa-3x"></i></div>');
    $('#profile-preview').empty();

    $.ajax({
        url: 'api/fetch_content.php',
        method: 'POST',
        data: { url: url },
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
    if (data.type === 'image') {
        html += '<img src="' + data.url + '" alt="Instagram Image" class="img-fluid">';
    } else if (data.type === 'video') {
        html += '<video src="' + data.url + '" controls class="img-fluid"></video>';
    }
    html += '<p class="mt-3">' + data.caption + '</p>';
    html += '<button class="btn btn-primary mt-3" onclick="downloadContent(\'' + data.url + '\')">Download</button>';
    $('#content-preview').html(html);
}

function displayProfilePreview(data) {
    var html = '<div class="profile-header">';
    html += '<img src="' + data.profile_picture + '" alt="Profile Picture" class="profile-picture">';
    html += '<div class="profile-info">';
    html += '<h2>' + data.username + '</h2>';
    html += '<p>' + data.bio + '</p>';
    html += '</div></div>';
    html += '<div class="profile-stats">';
    html += '<div class="stat-item"><div class="stat-value">' + data.posts + '</div><div>Posts</div></div>';
    html += '<div class="stat-item"><div class="stat-value">' + data.followers + '</div><div>Followers</div></div>';
    html += '<div class="stat-item"><div class="stat-value">' + data.following + '</div><div>Following</div></div>';
    html += '</div>';
    html += '<div class="media-grid">';
    data.recent_posts.forEach(function(post) {
        html += '<div class="media-item">';
        if (post.type === 'image') {
            html += '<img src="' + post.thumbnail + '" alt="Post thumbnail">';
        } else if (post.type === 'video') {
            html += '<video src="' + post.thumbnail + '"></video>';
        }
        html += '<div class="media-overlay">';
        html += '<span><i class="fas fa-heart"></i> ' + post.likes + '</span>';
        html += '<span><i class="fas fa-comment"></i> ' + post.comments + '</span>';
        html += '</div></div>';
    });
    html += '</div>';
    $('#profile-preview').html(html);
}

function downloadContent(url) {
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
        }).catch(console.error);
    } else {
        copyToClipboard(url);
    }
}

function showToast(message) {
    var toast = $('<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">')
        .append($('<div class="toast-body">').text(message));

    $('.toast-container').append(toast);
    toast.toast({ delay: 3000 }).toast('show');

    toast.on('hidden.bs.toast', function () {
        $(this).remove();
    });
}
$(document).ready(function() {
    $('.tab-button').click(function() {
        $('.tab-button').removeClass('active');
        $(this).addClass('active');

        // Here you can add logic to show/hide content based on the selected tab
        var contentType = $(this).data('type');
        console.log('Selected content type:', contentType);
        // Implement your content switching logic here
    });
});
$(document).ready(function() {
    $('#paste-btn').click(function() {
        navigator.clipboard.readText().then(function(text) {
            $('#instagram-url').val(text);
        });
    });

    $('#instagram-form').submit(function(e) {
        e.preventDefault();
        var url = $('#instagram-url').val();
        // Add your download logic here
        console.log('Downloading from URL:', url);
    });
});