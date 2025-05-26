<?php
$page_title_key = 'page_title_photo'; // Define page title key
$page_meta_desc_key = 'photo_meta_desc'; // Define meta description key
include 'includes/header.php';
// include 'includes/language.php'; // Removed as header.php now handles language.php
// include 'api/InstagramAPI.php'; // Removed as it's not directly used by this page for rendering
?>

<div class="hero-section">
    <div class="container">
        <?php include 'includes/content-tabs.php'; ?>

        <h1><?php echo _t('photo_page_h1', 'Instagram Photo Downloader'); ?></h1>
        <p class="lead text-center"><?php echo _t('hero_description'); // Assuming hero_description is generic enough ?></p>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <form id="instagram-form" class="download-form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="<?php echo _t('enter_instagram_photo_url', 'Insert Instagram photo link here'); ?>" name="instagram_url" id="instagram-url" required>
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button" id="paste-btn"><?php echo _t('paste_btn_text', 'Paste'); ?></button>
                            <button class="btn btn-primary" type="submit"><?php echo _t('download', 'Download'); ?></button>
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
            <h2>Download Instagram Photos in High Quality</h2> <!-- This H2 could also be made dynamic if needed -->
            <p>Our Instagram Photo Downloader allows you to save your favorite Instagram photos in the highest available quality. Whether it's a stunning landscape, a memorable event, or a creative portrait, you can now keep these images offline and view them anytime.</p>

            <h3>How to Download Instagram Photos:</h3>
            <ol>
                <li>Copy the link of the Instagram photo you want to download.</li>
                <li>Paste the link into the input field above.</li>
                <li>Click the "Download" button.</li>
                <li>Save the photo to your device.</li>
            </ol>

            <h3>Why Choose Our Instagram Photo Downloader?</h3>
            <ul>
                <li>High-Resolution Downloads: Get photos in their original quality.</li>
                <li>Fast and Easy: Simple process, quick downloads.</li>
                <li>No Registration Required: Start downloading immediately, no sign-up needed.</li>
                <li>Compatible with All Devices: Works on smartphones, tablets, and computers.</li>
                <li>Free to Use: No hidden costs or subscription fees.</li>
            </ul>

            <p class="mt-4"><?php echo nl2br(_t('photo_new_para1')); ?></p>
            <p><?php echo nl2br(_t('photo_new_para2')); ?></p>
        </div>

        <div class="col-md-8 offset-md-2 mt-4"> 
            <h3><?php echo _t('photo_extra_title', 'More About Photo Downloads'); ?></h3>
            <p><?php echo nl2br(_t('photo_extra_p1', 'Our service ensures that you download photos in their best available resolution. We support JPG, PNG, and other common image formats directly from Instagram.')); ?></p>
            <p><?php echo nl2br(_t('photo_extra_p2', 'When downloading, consider the aspect ratio and dimensions. Instagram often crops images for display, but our tool aims to get the original upload.')); ?></p>
        </div>
    </div>
</div>

<!-- The duplicated section below was present in the original file, I'm keeping it as per instructions to only add new content -->
<div class="container mt-5"> 
    <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
            <h2><?php echo _t('photo_extra_title', 'More About Photo Downloads'); ?></h2>
            <p><?php echo nl2br(_t('photo_extra_p1', 'Our service ensures that you download photos in their best available resolution. We support JPG, PNG, and other common image formats directly from Instagram.')); ?></p>
            <p><?php echo nl2br(_t('photo_extra_p2', 'When downloading, consider the aspect ratio and dimensions. Instagram often crops images for display, but our tool aims to get the original upload.')); ?></p>
        </div>
    </div>
</div>

<script>window.selectedContentType = 'photo';</script>
<?php include 'includes/footer.php'; ?>