<?php
session_start();

$available_languages = [
    'en' => 'English',
    'es' => 'Español',
    'fr' => 'Français',
    'de' => 'Deutsch',
    'it' => 'Italiano',
    'pt' => 'Português',
    'ru' => 'Русский',
    'ja' => '日本語',
    'ko' => '한국어',
    'zh' => '中文',
    'ar' => 'العربية',
    'hi' => 'हिन्दी',
    'nl' => 'Nederlands',
    'pl' => 'Polski',
    'tr' => 'Türkçe',
    'sv' => 'Svenska',
    'da' => 'Dansk',
    'fi' => 'Suomi',
    'no' => 'Norsk',
    'el' => 'Ελληνικά',
    'sw' => 'Kiswahili', // New
    'bn' => 'বাংলা'     // New
];

$language_flags = [
    'en' => 'gb', // United Kingdom for English
    'es' => 'es', // Spain
    'fr' => 'fr', // France
    'de' => 'de', // Germany
    'it' => 'it', // Italy
    'pt' => 'pt', // Portugal
    'ru' => 'ru', // Russia
    'ja' => 'jp', // Japan
    'ko' => 'kr', // South Korea
    'zh' => 'cn', // China
    'ar' => 'sa', // Saudi Arabia for Arabic
    'hi' => 'in', // India
    'nl' => 'nl', // Netherlands
    'pl' => 'pl', // Poland
    'tr' => 'tr', // Turkey
    'sv' => 'se', // Sweden
    'da' => 'dk', // Denmark
    'fi' => 'fi', // Finland
    'no' => 'no', // Norway
    'el' => 'gr', // Greece
    'sw' => 'ke', // Kenya for Swahili (Example, can be tz, ug etc.)
    'bn' => 'bd', // Bangladesh for Bengali
];

$default_language = 'en';

if (isset($_GET['lang']) && array_key_exists($_GET['lang'], $available_languages)) {
    $_SESSION['lang'] = $_GET['lang'];
} elseif (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = $default_language;
}

$current_language = $_SESSION['lang'];

include __DIR__ . "/../languages/{$current_language}.php";

function _t($key, $default = '') {
    global $lang;
    return isset($lang[$key]) ? $lang[$key] : $default;
}