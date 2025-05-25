<div class="content-tabs">
    <a href="video.php" class="tab-button <?php echo basename($_SERVER['PHP_SELF']) == 'video.php' ? 'active' : ''; ?>" data-type="video">
        <i class="fas fa-video"></i> <?php echo _t('video', 'Video'); ?>
    </a>
    <a href="photo.php" class="tab-button <?php echo basename($_SERVER['PHP_SELF']) == 'photo.php' ? 'active' : ''; ?>" data-type="photo">
        <i class="fas fa-image"></i> <?php echo _t('photo', 'Photo'); ?>
    </a>
    <a href="reels.php" class="tab-button <?php echo basename($_SERVER['PHP_SELF']) == 'reels.php' ? 'active' : ''; ?>" data-type="reels">
        <i class="fas fa-film"></i> <?php echo _t('reels', 'Reels'); ?>
    </a>
    <a href="story.php" class="tab-button <?php echo basename($_SERVER['PHP_SELF']) == 'story.php' ? 'active' : ''; ?>" data-type="story">
        <i class="fas fa-history"></i> <?php echo _t('story', 'Story'); ?>
    </a>
    <a href="igtv.php" class="tab-button <?php echo basename($_SERVER['PHP_SELF']) == 'igtv.php' ? 'active' : ''; ?>" data-type="igtv">
        <i class="fas fa-tv"></i> <?php echo _t('igtv', 'IGTV'); ?>
    </a>
    <a href="carousel.php" class="tab-button <?php echo basename($_SERVER['PHP_SELF']) == 'carousel.php' ? 'active' : ''; ?>" data-type="carousel">
        <i class="fas fa-images"></i> <?php echo _t('carousel', 'Carousel'); ?>
    </a>
    <a href="viewer.php" class="tab-button <?php echo basename($_SERVER['PHP_SELF']) == 'viewer.php' ? 'active' : ''; ?>" data-type="profile">
        <i class="fas fa-eye"></i> <?php echo _t('viewer', 'Viewer'); ?>
    </a>
</div>