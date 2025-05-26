<?php
// The _t() function is expected to be defined in includes/language.php,
// which is included by includes/header.php.
// Redundant definition removed from here.
?>
<footer class="bg-light py-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>SaveFromIG.com</h5>
                <p><?php echo _t('footer_description', 'Download Instagram content easily and quickly.'); ?></p>
            </div>
            <div class="col-md-3">
                <h5><?php echo _t('quick_links', 'Quick Links'); ?></h5>
                <ul class="list-unstyled">
                    <li><a href="index.php"><?php echo _t('home', 'Home'); ?></a></li>
                    <li><a href="#about"><?php echo _t('about', 'About'); ?></a></li>
                    <li><a href="#contact"><?php echo _t('contact', 'Contact'); ?></a></li>
                    <li><a href="faq.php"><?php echo _t('faq_link_text', 'FAQ'); ?></a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5><?php echo _t('follow_us', 'Follow Us'); ?></h5>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>&copy; 2024 SaveFromIG.com. <?php echo _t('all_rights_reserved', 'All rights reserved.'); ?></p>
            </div>
        </div>
    </div>
</footer>

<!-- Toast Container for notifications -->
<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1100"></div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>