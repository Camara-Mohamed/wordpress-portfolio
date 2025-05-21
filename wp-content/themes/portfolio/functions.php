<?php

// Vérifier si la session est active ("started")
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Chargement des fichiers séparés
require_once __DIR__.'/inc/cleanup.php';
require_once __DIR__.'/inc/assets.php';
require_once __DIR__.'/inc/menus.php';

// Support des fonctionnalités WordPress
add_theme_support('title-tag');
add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption']);

// Désactive la barre admin
add_action('after_setup_theme', function () {
    show_admin_bar(false);
});
