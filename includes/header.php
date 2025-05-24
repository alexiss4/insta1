<?php
include_once __DIR__ . '/language.php';

// Function to generate current page URL with new lang parameter
function get_lang_url($lang_code) {
    $current_params = $_GET;
    $current_params['lang'] = $lang_code;
    // REQUEST_URI could contain the query string, so parse it.
    $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
    $base_uri = $uri_parts[0];
    return $base_uri . '?' . http_build_query($current_params);
}
?>
<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($lang['site_title']) ? $lang['site_title'] : 'SaveFromIG.com'; ?></title>
    
    <?php
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    ?>
    <?php foreach ($available_languages as $code => $name): ?>
        <link rel="alternate" hreflang="<?php echo $code; ?>" href="<?php echo $protocol . $host; ?>/index.php?lang=<?php echo $code; ?>" />
    <?php endforeach; ?>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" alt="SaveFromIG Logo" height="30"> <!-- Fixed logo path -->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a> <!-- Kept FAQ as per original structure -->
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php if (isset($language_flags[$current_language])): ?>
                                <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/4.1.5/flags/4x3/<?php echo $language_flags[$current_language]; ?>.svg" alt="<?php echo $current_language; ?> flag" style="width: 20px; margin-right: 8px; vertical-align: middle;">
                            <?php endif; ?>
                            <?php echo isset($available_languages[$current_language]) ? $available_languages[$current_language] : 'Language'; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
                            <?php foreach ($available_languages as $code => $name): ?>
                                <a class="dropdown-item <?php if ($code === $current_language) echo 'active'; ?>" href="<?php echo get_lang_url($code); ?>">
                                    <?php if (isset($language_flags[$code])): ?>
                                        <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/4.1.5/flags/4x3/<?php echo $language_flags[$code]; ?>.svg" alt="<?php echo $code; ?> flag" style="width: 20px; margin-right: 8px; vertical-align: middle;">
                                    <?php endif; ?>
                                    <?php echo $name; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div> <!-- container -->
    </nav> <!-- navbar -->
    <!-- Removed extra closing </div> and </nav> tags -->