<?php
include 'instagram_api.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['instagram_url'];
    $contentType = $_POST['content_type'];

    $result = extractInstagramContent($url, $contentType);

    echo $result;
} else {
    echo "Invalid request method";
}