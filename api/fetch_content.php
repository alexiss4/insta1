<?php
header('Content-Type: application/json');

require_once 'InstagramAPI.php'; // Or include_once

if (!isset($_POST['url']) || empty(trim($_POST['url']))) {
    echo json_encode([
        'success' => false,
        'message' => 'URL not provided'
    ]);
    exit;
}

$url = trim($_POST['url']);
$contentType = isset($_POST['contentType']) ? trim($_POST['contentType']) : null;
// Note: The $contentType variable is now available.
// For the current mock InstagramAPI, it's not strictly needed as getMediaInfo()
// primarily uses the URL to determine the mock data type.
// However, a real API might use this for more specific requests.

$api = new InstagramAPI();
$mediaInfo = $api->getMediaInfo($url); // contentType is not passed to the mock API

if (isset($mediaInfo['error'])) {
    echo json_encode([
        'success' => false,
        'message' => $mediaInfo['error'] // Message from InstagramAPI
    ]);
} else {
    // The data from getMediaInfo is already structured correctly
    // for what the frontend expects (e.g., type, url, is_profile etc.)
    echo json_encode([
        'success' => true,
        'data' => $mediaInfo
    ]);
}
?>