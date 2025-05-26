<?php
$page_title_key = 'page_title_story'; // Define page title key
$page_meta_desc_key = 'story_meta_desc'; // Define meta description key
include 'includes/header.php';
// include 'includes/language.php'; // Removed as header.php now handles language.php
// include 'api/InstagramAPI.php'; // Removed as it's not directly used by this page for rendering
?>

<div class="hero-section">
    <div class="container">
        <?php include 'includes/content-tabs.php'; ?>

        <h1><?php echo _t('story_page_h1', 'Instagram Story Downloader'); ?></h1>
        <p class="lead text-center"><?php echo _t('hero_description'); // Assuming hero_description is generic enough ?></p>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <form id="instagram-form" class="download-form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="<?php echo _t('enter_instagram_username_story', 'Insert Instagram username here'); ?>" name="instagram_url" id="instagram-url" required>
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
            <h2>Download Instagram Stories Before They're Gone</h2> <!-- This H2 could also be made dynamic if needed -->
            <p>Our Instagram Story Downloader allows you to save temporary Instagram Stories permanently. Don't miss out on important moments or creative content that would otherwise disappear after 24 hours.</p>

            <h3>How to Download Instagram Stories:</h3>
            <ol>
                <li>Find the Instagram username of the account whose story you want to download.</li>
                <li>Enter the username in the input field above.</li>
                <li>Click "Download" to see all available stories.</li>
                <li>Select the stories you want to save and download them to your device.</li>
            </ol>

            <h3>Benefits of Our Instagram Story Downloader:</h3>
            <ul>
                <li>Save Ephemeral Content: Keep stories that would otherwise disappear.</li>
                <li>High-Quality Downloads: Get stories in their original quality.</li>
                <li>Multiple Format Support: Download both video and image stories.</li>
                <li>Anonymous Usage: No need to log in to Instagram.</li>
                <li>Fast and Reliable: Quick downloads for time-sensitive content.</li>
            </ul>

            <p class="mt-4"><?php echo nl2br(_t('story_new_para1')); ?></p>
            <p><?php echo nl2br(_t('story_new_para2')); ?></p>
        </div>

        <div class="col-md-8 offset-md-2 mt-4"> 
            <h3><?php echo _t('story_extra_title', 'Story Download Specifics'); ?></h3>
            <p><?php echo nl2br(_t('story_extra_p1', 'Downloading stories is time-sensitive as they expire. Our tool fetches currently available public stories for the given username.')); ?></p>
            <p><?php echo nl2br(_t('story_extra_p2', 'Please be aware that you cannot download stories from private accounts or stories that have already expired.')); ?></p>
        </div>
    </div>
</div>

<script>window.selectedContentType = 'story';</script>
<?php include 'includes/footer.php'; ?>