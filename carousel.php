<?php
$page_title_key = 'page_title_carousel'; // Define page title key
include 'includes/header.php';
// include 'includes/language.php'; // Removed as header.php now handles language.php
// include 'api/InstagramAPI.php'; // Removed as it's not directly used by this page for rendering
?>

<div class="hero-section">
    <div class="container">
        <?php include 'includes/content-tabs.php'; ?>

        <h1 class="text-center">Instagram Carousel Downloader</h1>
        <p class="lead text-center">Download multiple photos and videos from Instagram carousels</p>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <form id="instagram-form" class="download-form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Insert Instagram carousel post link here" name="instagram_url" id="instagram-url" required>
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
            <h2>Download All Media from Instagram Carousels</h2>
            <p>Our Instagram Carousel Downloader allows you to save all photos and videos from multi-post Instagram carousels. Don't miss any part of a story or collection shared in a single post.</p>

            <h3>How to Download Instagram Carousels:</h3>
            <ol>
                <li>Find the Instagram carousel post you want to download.</li>
                <li>Copy the post's URL from your browser or the Instagram app.</li>
                <li>Paste the URL into the input field above.</li>
                <li>Click "Download" to get all media files from the carousel.</li>
            </ol>

            <h3>Features of Our Carousel Downloader:</h3>
            <ul>
                <li>Bulk Download: Get all photos and videos from a carousel in one go.</li>
                <li>Mixed Media Support: Download both images and videos from the same post.</li>
                <li>Original Quality: Save media in its highest available resolution.</li>
                <li>Easy Organization: Downloaded files are numbered in the order they appear in the carousel.</li>
                <li>Time-Saving: No need to manually screenshot or screen-record carousel items.</li>
            </ul>
        </div>
    </div>
</div>

<script>window.selectedContentType = 'carousel';</script>
<?php include 'includes/footer.php'; ?>