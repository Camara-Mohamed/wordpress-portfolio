<?php

// Vérifier si la session est active ("started")
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Chargement des fichiers séparés
require_once __DIR__.'/inc/cleanup.php';
require_once __DIR__.'/inc/assets.php';
require_once __DIR__.'/inc/menus.php';
require_once __DIR__.'/inc/contact.php';
require_once __DIR__.'/inc/post-types.php';

// Support des fonctionnalités WordPress
add_theme_support('title-tag');
add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption']);

// Désactive la barre admin
add_action('after_setup_theme', function () {
    show_admin_bar(false);
});

// Tailles d'images
add_image_size('hero-lg', 1200, 675, true);
add_image_size('hero-md', 800, 450, true);
add_image_size('hero-sm', 400, 225, true);

// Gestion du formulaire
add_action('admin_post_submit_contact_form', 'dw_handle_contact_form');
add_action('admin_post_nopriv_submit_contact_form', 'dw_handle_contact_form');

// Réécrire les liens de paginations
function simple_project_pagination() {
    add_rewrite_rule(
        '^mes-projets/page/([0-9]+)/?$',
        'index.php?pagename=mes-projets&paged=$matches[1]',
        'top'
    );
}
add_action('init', 'simple_project_pagination');