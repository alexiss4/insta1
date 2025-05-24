<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'savefromig_db');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');

// Site configuration
define('SITE_URL', 'https://savefromig.com');
define('SITE_NAME', 'SaveFromIG.com');

// API configuration
define('INSTAGRAM_API_KEY', 'your_instagram_api_key');

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
session_start();

// Set default timezone
date_default_timezone_set('UTC');

// Load database connection
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error connecting to database: " . $e->getMessage());
}

// Load functions
require_once 'functions.php';