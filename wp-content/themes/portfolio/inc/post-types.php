<?php

// Enregistrement du custom post type

// Les messages
register_post_type('contact_message', [
    'label' => 'Messages de contact',
    'description' => 'Les envois de formulaire via la page de contact',
    'menu_position' => 10,
    'menu_icon' => 'dashicons-email',
    'public' => false,
    'show_ui' => true,
    'has_archive' => false,
    'supports' => ['title', 'editor'],
]);

// CPT de Projets
register_post_type('project', [
    'labels' => [
        'name'               => 'Projets',
        'singular_name'      => 'Projet',
        'menu_name'          => 'Projets',
        'add_new_item'       => 'Ajouter un projet',
        'edit_item'          => 'Modifier le projet'
    ],
    'public'        => true,
    'has_archive'   => true,
    'menu_icon'     => 'dashicons-portfolio',
    'supports'      => ['title', 'editor', 'thumbnail', 'excerpt'],
    'rewrite'       => ['slug' => 'mes-projets'],
    'show_in_rest'  => true
]);