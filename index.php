<?php
$page_title_key = 'page_title_home'; // Define page title key
$page_body_id = 'page-index';        // Define body ID for index.php
include 'includes/header.php';
// include 'api/InstagramAPI.php'; // Removed as it's not directly used by index.php for rendering
?>


<div class="hero-section">
    <div class="container">
        <?php include 'includes/content-tabs.php'; ?>
        <h1 class="text-center">Instagram Downloader</h1>
        <p class="lead text-center">Download Instagram Videos, Photos, Reels, IGTV & carousel</p>
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <form id="instagram-form" class="download-form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Insert instagram link here" name="instagram_url" id="instagram-url" required>
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

        <div class="col-md-10 offset-md-1">
            <h2 class="text-center mb-4"><?php echo _t('about_title', 'Save Instagram Content with Our All-in-One Downloader'); ?></h2>

            <h3><?php echo _t('what_we_offer', 'What We Offer: Comprehensive Instagram Content Download Solutions'); ?></h3>
            <p><?php echo _t('offer_description', 'Our Instagram Downloader is your go-to tool for saving all types of Instagram content. Whether you\'re looking to download Instagram videos, save Instagram photos, capture Instagram Stories, or archive Instagram Reels, we\'ve got you covered. Our platform supports a wide range of Instagram content, including IGTV videos and carousel posts, ensuring you never miss out on your favorite Instagram moments.'); ?></p>

            <h3><?php echo _t('how_to_use', 'How to Use Our Instagram Downloader: Quick and Easy Steps'); ?></h3>
            <ol>
                <li><?php echo _t('step1', 'Copy the URL: Find the Instagram post, video, photo, or story you want to download and copy its URL.'); ?></li>
                <li><?php echo _t('step2', 'Paste the Link: Come back to our Instagram Downloader and paste the copied URL into the input field.'); ?></li>
                <li><?php echo _t('step3', 'Click Download: Hit the download button and wait for our tool to process the Instagram content.'); ?></li>
                <li><?php echo _t('step4', 'Save Your Content: Once processed, click on the download link to save the Instagram content to your device.'); ?></li>
            </ol>

            <h3><?php echo _t('key_features_summary_title', 'Core Features of Our Instagram Downloader'); ?></h3>
            <p><?php echo _t('key_features_summary_text'); ?></p>

            <h3><?php echo _t('why_use', 'Why Use Our Instagram Downloader?'); ?></h3>
            <p><?php echo _t('why_use_summary_text'); ?></p>

            <h3><?php echo _t('privacy_security', 'Privacy and Security'); ?></h3>
            <p><?php echo _t('privacy_description', 'We prioritize your privacy and security when using our Instagram Downloader. Our service doesn\'t store your personal information or the content you download. We operate in compliance with Instagram\'s terms of service and respect copyright laws. Always ensure you have the right to download and use the Instagram content you\'re saving.'); ?></p>

            <h3><?php echo _t('conclusion', 'Start Downloading Instagram Content Today!'); ?></h3>
            <p><?php echo _t('conclusion_description', 'Whether you\'re looking to download Instagram videos, save Instagram photos, capture fleeting Instagram Stories, or archive trending Instagram Reels, our Instagram Downloader is your all-in-one solution. With its user-friendly interface, support for multiple content types, and commitment to high-quality downloads, you\'re just a few clicks away from saving your favorite Instagram content. Try our Instagram Downloader now and never lose a precious Instagram moment again!'); ?></p>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>