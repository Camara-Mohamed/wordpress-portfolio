<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Meta de base -->
    <meta name="author" content="Mohamed Camara">
    <meta name="keywords"
          content="<?= __('Mohamed Camara, portfolio, développeur web, designer Graphique, développeur, front-end, 
          back-end, full-stack, HEPL, technique graphique, étudiant, wordpress, html, css, javascript') ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <!-- Title -->
    <title>
        <?php
        if (is_front_page()) {
            echo _e('Accueil', 'portfolio-detective').' -  '.get_bloginfo('name');
        } else {
            echo wp_title('', false).' - '.get_bloginfo('name');
        }
        ?>
    </title>

    <!-- Open Graph -->
    <meta property="og:title" content="<?php
    if (is_front_page()) {
        echo _e('Accueil', 'portfolio-detective').'- '.get_bloginfo('name');
    } else {
        echo wp_title('', false).' - '.get_bloginfo('name');
    }
    ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= home_url(); ?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">

    <!-- TODO : Mon Logo -->
    <meta property="og:image"
          content="<?= get_template_directory_uri(); ?>">

    <?php wp_head(); ?>
</head>
<body itemscope itemtype="https://schema.org/Person">
<h1 class="hidden"><?= get_the_title(); ?></h1>

<a class="skip__link hidden" href="#main-content"><?php __('Aller au contenu principal', 'portfolio-detective')
    ?></a>

<header id="header" class="header" role="banner">
    <div class="header__container">
        <nav class="header__nav" aria-label="<?php __('Navigation principale', 'portfolio-detective'); ?>">
            <h2 class="hidden"><?php __('Navigation principale', 'portfolio-detective'); ?></h2>
            <a href="<?= home_url('/'); ?>" itemprop="url"><?= get_bloginfo('name') ?></a>

            <ul class="header__nav--container">
                <?php foreach (dw_get_navigation_links('header') as $link): ?>
                    <li class="nav__item<?= $link->current ? ' nav__item--current' : '' ?>">
                        <a href="<?= $link->href ?>" class="nav__link">
                            <?= $link->label ?>
                        </a>
                    </li>
                <?php endforeach; ?>

                <li class="nav__item--language">
                    <?php foreach (dw_get_languages() as $lang): ?>
                        <a href="<?= $lang->url; ?>"
                           class="nav__link--language"
                           hreflang="<?= $lang->locale; ?>"
                           title="<?= sprintf(__('Passer en %s', 'portfolio-detective'), $lang->label); ?>">
                            <?= strtoupper($lang->code); ?>
                        </a>
                    <?php endforeach; ?>
                </li>
            </ul>
        </nav>
    </div>
</header>