<?php
include 'api/InstagramAPI.php';

$api = new InstagramAPI();
$url = 'https://www.instagram.com/p/BwngA9kBYv_/';  // Replace with actual Instagram URL
$mediaInfo = $api->getMediaInfo($url);

if ($mediaInfo) {
    // Process and display the media info
    switch ($mediaInfo['type']) {
        case 'image':
            echo "<img src='{$mediaInfo['url']}' alt='Instagram Image'>";
            break;
        case 'video':
            echo "<video src='{$mediaInfo['url']}' controls poster='{$mediaInfo['thumbnail']}'></video>";
            break;
        case 'carousel':
            foreach ($mediaInfo['items'] as $item) {
                if ($item['type'] == 'image') {
                    echo "<img src='{$item['url']}' alt='Instagram Image'>";
                } else {
                    echo "<video src='{$item['url']}' controls></video>";
                }
            }
            break;
    }
    echo "<p>{$mediaInfo['caption']}</p>";
} else {
    echo "Failed to fetch media information.";
}