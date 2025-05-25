<?php
require_once 'api/InstagramAPI.php';

if (!isset($_GET['url']) || empty(trim($_GET['url']))) {
    http_response_code(400);
    echo "Error: URL not provided.";
    exit;
}

$url = trim($_GET['url']);
$api = new InstagramAPI();
$mediaInfo = $api->getMediaInfo($url);

if (!$mediaInfo || isset($mediaInfo['error'])) {
    http_response_code(404);
    $errorMessage = "Error: Could not fetch media information.";
    if (isset($mediaInfo['error'])) {
        $errorMessage .= " Reason: " . $mediaInfo['error'];
    }
    echo $errorMessage;
    exit;
}

$downloadUrl = null;
$originalType = null; // 'image', 'video'
$filename = 'instagram_media';
$contentType = 'application/octet-stream'; // Default content type

if (isset($mediaInfo['type'])) {
    $type = $mediaInfo['type'];
    if ($type === 'image' || $type === 'video') {
        $downloadUrl = $mediaInfo['url'];
        $originalType = $type;
    } elseif ($type === 'carousel') {
        if (!empty($mediaInfo['items']) && isset($mediaInfo['items'][0]['url']) && isset($mediaInfo['items'][0]['type'])) {
            $downloadUrl = $mediaInfo['items'][0]['url'];
            $originalType = $mediaInfo['items'][0]['type']; // This will be 'image' or 'video'
        } else {
            http_response_code(404);
            echo "Error: Carousel is empty or item is invalid.";
            exit;
        }
    } else {
        // This case should not be reached if InstagramAPI returns valid mock data.
        // but as a safeguard:
        http_response_code(400);
        echo "Error: Unknown or unsupported media type for download: " . htmlspecialchars($type);
        exit;
    }
} elseif (isset($mediaInfo['is_profile']) && $mediaInfo['is_profile']) {
    // Handle profile URLs specifically, as they don't have a 'type' field for direct media download
    http_response_code(400);
    echo "Error: Profile URLs are not directly downloadable. Please provide a post or reel URL.";
    exit;
} else {
    // Generic error if structure is not as expected
    http_response_code(500);
    echo "Error: Media information is incomplete or invalid for download.";
    exit;
}

// Determine content type and filename based on the mock URL
$fileContent = null;
$isKnownMockUrl = false;

// Ensure $downloadUrl is not null before proceeding
if ($downloadUrl === null) {
    http_response_code(500);
    echo "Error: Could not determine a download URL from the media information.";
    exit;
}

if (strpos($downloadUrl, 'via.placeholder.com') !== false) {
    $contentType = 'image/png';
    $filename = 'instagram_media.png';
    $isKnownMockUrl = true;
} elseif (strpos($downloadUrl, 'w3schools.com/html/mov_bbb.mp4') !== false) {
    $contentType = 'video/mp4';
    $filename = 'instagram_media.mp4';
    $isKnownMockUrl = true;
} else {
    // For any other mock URL, or if the original type was not an image/video
    $contentType = 'text/plain';
    $filename = 'instagram_media.txt';
    $fileContent = "This is a mock download for an item of type '" . htmlspecialchars($originalType) . "' from URL: " . htmlspecialchars($downloadUrl) . "\n";
    $fileContent .= "The application is using mock data, so direct download of this specific content might not be supported in a real scenario without actual file hosting.";
}

if ($isKnownMockUrl) {
    // Suppress errors for file_get_contents in case the mock server is down
    $fetchedContent = @file_get_contents($downloadUrl);
    if ($fetchedContent !== false) {
        $fileContent = $fetchedContent;
    } else {
        // Fallback if known mock URL fails to load
        $contentType = 'text/plain'; // Change content type for the error message
        $filename = 'instagram_media_fallback.txt'; // Change filename for the error message
        $fileContent = "Error: Could not fetch mock content from " . htmlspecialchars($downloadUrl) . ".\n";
        $fileContent .= "This is a fallback dummy file for an item of type '" . htmlspecialchars($originalType) . "'.";
         // We are sending a text file, so make sure error is not sent before headers
        // http_response_code(502); // Bad Gateway - if we consider the mock server an upstream
    }
}

// Set headers for download
// Ensure no output before headers
if (headers_sent()) {
    // This should not happen if error messages exit properly
    echo "\nError: Headers already sent. Cannot initiate download.";
    exit;
}

header('Content-Type: ' . $contentType);
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Transfer-Encoding: Binary'); 
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
if ($fileContent !== null) {
    header('Content-Length: ' . strlen($fileContent));
} else {
    // Should not happen if $fileContent is always set
    header('Content-Length: 0');
}

// Output the file content
echo $fileContent;
exit;
?>