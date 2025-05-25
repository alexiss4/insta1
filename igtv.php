<?php
$page_title_key = 'page_title_igtv'; // Define page title key
include 'includes/header.php';
// include 'includes/language.php'; // Removed as header.php now handles language.php
// include 'api/InstagramAPI.php'; // Removed as it's not directly used by this page for rendering
?>

<div class="hero-section">
    <div class="container">
        <?php include 'includes/content-tabs.php'; ?>

        <h1 class="text-center">Instagram IGTV Downloader</h1>
        <p class="lead text-center">Download long-form IGTV videos from Instagram</p>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <form id="instagram-form" class="download-form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Insert IGTV video link here" name="instagram_url" id="instagram-url" required>
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button" id="paste-btn">Paste</button>
                            <button class="btn btn-primary" type="submit">Download</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div id="content-preview" class="mb-4"></div>
    <div id="profile-preview" class="mb-4"></div>
</div>

<div class="container mt-5">
    <h2 class="text-center mb-5"><?php echo _t('why_choose_us', 'Why Choose Us'); ?></h2>
    <div class="row">
        <div class="col-md-4">
            <div class="feature-box text-center">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3><?php echo _t('fast_and_easy', 'Fast & Easy'); ?></h3>
                <p><?php echo _t('fast_and_easy_desc', 'Download Instagram content with just one click'); ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box text-center">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3><?php echo _t('safe_and_secure', 'Safe & Secure'); ?></h3>
                <p><?php echo _t('safe_and_secure_desc', 'We don\'t store any of your personal information'); ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box text-center">
                <div class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3><?php echo _t('mobile_friendly', 'Mobile Friendly'); ?></h3>
                <p><?php echo _t('mobile_friendly_desc', 'Works perfectly on all devices'); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h2 class="text-center mb-5"><?php echo _t('supported_content', 'Supported Content'); ?></h2>
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="content-type-box text-center">
                <div class="content-icon">
                    <i class="fas fa-image"></i>
                </div>
                <h4><?php echo _t('photos', 'Photos'); ?></h4>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="content-type-box text-center">
                <div class="content-icon">
                    <i class="fas fa-video"></i>
                </div>
                <h4><?php echo _t('videos', 'Videos'); ?></h4>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="content-type-box text-center">
                <div class="content-icon">
                    <i class="fas fa-film"></i>
                </div>
                <h4><?php echo _t('reels', 'Reels'); ?></h4>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="content-type-box text-center">
                <div class="content-icon">
                    <i class="fas fa-tv"></i>
                </div>
                <h4><?php echo _t('igtv', 'IGTV'); ?></h4>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Save IGTV Videos in High Quality</h2>
            <p>Our Instagram IGTV Downloader enables you to save long-form videos from IGTV. Whether it's a tutorial, a mini-documentary, or an extended vlog, you can now keep these videos offline for later viewing.</p>

            <h3>How to Download IGTV Videos:</h3>
            <ol>
                <li>Open the IGTV video you want to download in the Instagram app or website.</li>
                <li>Copy the video's URL from the address bar or share menu.</li>
                <li>Paste the URL into the input field above.</li>
                <li>Click "Download" and choose where to save the video on your device.</li>
            </ol>

            <h3>Why Choose Our IGTV Downloader:</h3>
            <ul>
                <li>Full-Length Videos: Download entire IGTV videos, regardless of duration.</li>
                <li>High Definition: Save videos in the best available quality, up to 1080p.</li>
                <li>Fast Processing: Quick conversion and download of large video files.</li>
                <li>No Watermarks: Get clean, unaltered videos without any overlays.</li>
                <li>Cross-Platform Compatibility: Works on all major operating systems and devices.</li>
            </ul>
        </div>

        <div class="col-md-8 offset-md-2 mt-4"> <!-- New unique section for igtv.php -->
            <h3><?php echo _t('igtv_extra_title', 'IGTV Download Tips'); ?></h3>
            <p><?php echo _t('igtv_extra_p1', 'IGTV videos are typically longer. Ensure you have a stable connection for larger downloads. Our tool aims to get the full video in the best quality.'); ?></p>
            <p><?php echo _t('igtv_extra_p2', 'You can copy the IGTV link directly from the Instagram app or website. Publicly available IGTVs are supported.'); ?></p>
        </div>
    </div>
</div>

<script>window.selectedContentType = 'igtv';</script>
<?php include 'includes/footer.php'; ?>