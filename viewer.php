<?php
$page_title_key = 'page_title_profile'; // Define page title key
$page_meta_desc_key = 'viewer_meta_desc'; // Define meta description key for header.php
include 'includes/header.php';
// include 'includes/language.php'; // Removed as header.php now handles language.php
// include 'api/InstagramAPI.php'; // Removed as it's not directly used by this page for rendering
?>

<div class="hero-section">
    <div class="container">
        <?php include 'includes/content-tabs.php'; ?>

        <h1 class="text-center"><?php echo _t('viewer_page_h1', 'Instagram Profile Viewer'); ?></h1>
        <p class="lead text-center">View Instagram profiles anonymously and download content</p>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <form id="instagram-form" class="download-form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter Instagram username" name="instagram_url" id="instagram-url" required>
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button" id="paste-btn">Paste</button>
                            <button class="btn btn-primary" type="submit">View Profile</button>
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
            <h2>Anonymous Instagram Profile Viewer and Downloader</h2>
            <p>Our Instagram Profile Viewer lets you browse Instagram profiles without logging in or leaving a trace. View photos, videos, and stories, and download the content you like.</p>

            <h3>How to Use the Instagram Profile Viewer:</h3>
            <ol>
                <li>Enter the Instagram username of the profile you want to view in the input field above.</li>
                <li>Click "View Profile" to see the user's public content.</li>
                <li>Browse through posts, stories, and highlights anonymously.</li>
                <li>Download any media by clicking on the download button next to each item.</li>
            </ol>

            <h3>Benefits of Our Instagram Profile Viewer:</h3>
            <ul>
                <li>Anonymous Viewing: Browse profiles without the user knowing.</li>
                <li>No Login Required: Access public profiles without an Instagram account.</li>
                <li>Download Option: Save photos, videos, and stories directly from the viewer.</li>
                <li>Full Profile Overview: See posts, highlights, and basic profile information.</li>
                <li>User-Friendly Interface: Easy navigation and intuitive design.</li>
            </ul>
            <p class="mt-4"><?php echo nl2br(_t('viewer_new_para1')); ?></p>
            <p><?php echo nl2br(_t('viewer_new_para2')); ?></p>
        </div> <!-- Closing the col-md-8 offset-md-2 -->

        <div class="col-md-8 offset-md-2 mt-4"> <!-- New unique section for viewer.php -->
            <h3><?php echo _t('viewer_extra_title', 'Profile Viewing Tips'); ?></h3>
            <p><?php echo nl2br(_t('viewer_extra_p1', 'When viewing profiles, remember that only public information is accessible. Our tool does not bypass Instagram\'s privacy settings.')); ?></p>
            <p><?php echo nl2br(_t('viewer_extra_p2', 'You can use the viewer to check out recent posts and story highlights of public profiles without needing to log in.')); ?></p>
        </div>
    </div> <!-- Closing the row -->
</div> <!-- Closing the container mt-5 -->
<script>window.selectedContentType = 'profile';</script>
<?php include 'includes/footer.php'; ?>