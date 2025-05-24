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
    'el' => 'Ελληνικά'
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