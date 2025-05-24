<?php
include_once __DIR__ . '/language.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
<head>
    <?php foreach ($available_languages as $code => $name): ?>
        <link rel="alternate" hreflang="<?php echo $code; ?>" href="https://savefromig.com/<?php echo $code; ?>.php" />
    <?php endforeach; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($lang['site_title']) ? $lang['site_title'] : 'SaveFromIG.com'; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="path/to/your/logo.png" alt="SaveFromIG" height="30">
            </a>
            <div class="ml-auto">
                <a href="#" class="mr-3">FAQ</a>
                <div class="dropdown d-inline-block">
                    <button class="btn btn-link dropdown-toggle" type="button" id="languageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        EN
                    </button>

                            </button>
                            <div class="dropdown-menu" aria-labelledby="languageDropdown">
                                <?php foreach ($available_languages as $code => $name): ?>
                                    <a class="dropdown-item" href="<?php echo $code; ?>.php"><?php echo $name; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- Add more languages as needed -->
                    </div>
                </div>
            </div>
        </div>
    </nav>
        
    </nav>