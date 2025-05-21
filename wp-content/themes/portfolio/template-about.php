<?php
/**
 * Template Name: À propos
 */
?>

<?php get_header(); ?>

    <main id="main-content" class="main-content" role="main">
        <?php

        // Hero avec deux images
        $hero_args = [
            'images' => [
                get_field('about_image_1'),
                get_field('about_image_2')
            ]
        ];

        get_template_part('templates/partials/section-hero', null, $hero_args); ?>

    </main>

<?php get_footer(); ?>