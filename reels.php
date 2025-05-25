<?php
$page_title_key = 'page_title_reels'; // Define page title key
include 'includes/header.php';
// include 'includes/language.php'; // Removed as header.php now handles language.php
// include 'api/InstagramAPI.php'; // Removed as it's not directly used by this page for rendering
?>

<div class="hero-section">
    <div class="container">
        <?php include 'includes/content-tabs.php'; ?>

        <h1 class="text-center">Instagram Reels Downloader</h1>
        <p class="lead text-center">Download Instagram Reels videos quickly and easily</p>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <form id="instagram-form" class="download-form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Insert Instagram Reels link here" name="instagram_url" id="instagram-url" required>
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
            <h2>Save Instagram Reels Videos Offline</h2>
            <p>Our Instagram Reels Downloader lets you save entertaining and creative short-form videos from Instagram. Keep your favorite Reels on your device to watch anytime, even without an internet connection.</p>

            <h3>How to Download Instagram Reels:</h3>
            <ol>
                <li>Open the Instagram app and find the Reels video you want to download.</li>
                <li>Tap on the three dots (...) and select "Copy Link".</li>
                <li>Paste the copied link into the input field above.</li>
                <li>Click "Download" and save the Reels video to your device.</li>
            </ol>

            <h3>Why Use Our Instagram Reels Downloader?</h3>
            <ul>
                <li>High-Quality Videos: Download Reels in the best available quality.</li>
                <li>Audio Included: Save videos with their original audio tracks.</li>
                <li>No Login Required: Download Reels without an Instagram account.</li>
                <li>Easy to Use: Simple, user-friendly interface for quick downloads.</li>
                <li>Free Service: No hidden fees or subscriptions.</li>
            </ul>
        </div>

        <div class="col-md-8 offset-md-2 mt-4"> <!-- New unique section for reels.php -->
            <h3><?php echo _t('reels_extra_title', 'Understanding Reels Downloads'); ?></h3>
            <p><?php echo _t('reels_extra_p1', 'Reels are short, engaging videos. Our tool helps you save these quickly. Downloaded Reels include audio and are saved in standard video formats.'); ?></p>
            <p><?php echo _t('reels_extra_p2', 'Please note that some Reels may have specific privacy settings that could affect download availability if they are not public.'); ?></p>
        </div>
    </div>
</div>

<script>window.selectedContentType = 'reels';</script>
<?php include 'includes/footer.php'; ?>