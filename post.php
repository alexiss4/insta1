<?php
require 'config.php';

if (isset($_POST['url'])) {
    $url = $_POST['url'];
    $mediaId = $ig->media->getMediaIdFromUrl($url);
    $mediaInfo = $ig->media->getInfo($mediaId);

    $mediaType = $mediaInfo->getItems()[0]->getMediaType();
    $mediaUrl = "";
    $profilePic = $mediaInfo->getItems()[0]->getUser()->getProfilePicUrl();
    $username = $mediaInfo->getItems()[0]->getUser()->getUsername();

    if ($mediaType == 1) {
        // صورة
        $mediaUrl = $mediaInfo->getItems()[0]->getImageVersions2()->getCandidates()[0]->getUrl();
    } elseif ($mediaType == 2) {
        // فيديو
        $mediaUrl = $mediaInfo->getItems()[0]->getVideoVersions()[0]->getUrl();
    }

    echo '<div class="media-content">';
    echo '<img src="' . $profilePic . '" alt="' . $username . '" class="profile-pic">';
    echo '<p>@' . $username . '</p>';
    echo '<img src="' . $mediaUrl . '" alt="Media">';
    echo '<a href="download.php?url=' . $mediaUrl . '" class="btn btn-download">' . $lang['download'] . '</a>';
    echo '</div>';
}
?>
