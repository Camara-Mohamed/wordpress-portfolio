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
        echo _e('Accueil', 'portfolio-detective').' - '.get_bloginfo('name');
    } else {
        echo wp_title('', false).' - '.get_bloginfo('name');
    }
    ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= home_url(); ?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:image"
          content="<?= get_template_directory_uri().'/resources/svg/logo-simple.svg'; ?>">

    <?php wp_head(); ?>
</head>
<body itemscope itemtype="https://schema.org/Person">

<noscript>
    <p class="no-js__message">
        <?php _e('Pour accéder à toutes les fonctionnalités de ce site, vous devez activer JavaScript.',
            'portfolio-detective') ?> <br>
        <?php _e('Voici les', 'portfolio-detective') ?><a href="https://www.enable-javascript.com/fr/" hreflang="fr"
                                                          title="<?= __
                                                          ('vers le site enable-javascript',
                                                              'portfolio-detective') ?>"><?php _e('instructions pour activer JavaScript dans votre navigateur Web') ?></a>.
    </p>
</noscript>

<h1 class="sro" role="heading" aria-level="1"><?= get_the_title(); ?></h1>

<a class="skip__link sro" href="#main-content"><?php _e('Aller au contenu principal', 'portfolio-detective')
    ?></a>

<header id="header" class="header">
    <div class="header__container">
        <nav class="header__nav" aria-label="<?php _e('Navigation principale', 'portfolio-detective'); ?>"
             role="navigation">
            <h2 class="sro" aria-level="2"><?php _e('Navigation principale',
                    'portfolio-detective'); ?></h2>
            <a href="<?= home_url('/'); ?>" itemprop="url" title="<?php _e('Aller à la page d\'accueil'); ?>"><?=
                get_bloginfo('name') ?></a>

            <input type="checkbox" id="burger-menu" class="sro" aria-label="Burger menu"/>
            <label for="burger-menu" class="header__nav--burger">
                <span></span>
            </label>

            <ul class="header__nav--container">
                <?php foreach (dw_get_navigation_links('header') as $link): ?>
                    <li class="nav__item<?= $link->current ? ' nav__item--current' : '' ?>">
                        <a href="<?= $link->href ?>" class="nav__link"
                           title="<?= __('Aller à ma page : ', 'portfolio-detective').
                           $link->label; ?>"
                           aria-label="<?= __('Aller à ma page :', 'portfolio-detective').' '.
                           $link->label; ?>">
                            <?= $link->label ?>
                        </a>
                    </li>
                <?php endforeach; ?>

                <li class="nav__item--language">
                    <?php foreach (dw_get_languages() as $lang): ?>
                        <a href="<?= $lang->url; ?>"
                           class="nav__link--language"
                           hreflang="<?= $lang->locale; ?>"
                           title="<?= __('Changer en ', 'portfolio-detective'), $lang->label; ?>"
                           aria-label="<?= __('Changer la langue en ', 'portfolio-detective'), $lang->label; ?>">
                            <?= strtoupper($lang->code); ?>
                        </a>
                    <?php endforeach; ?>
                </li>
            </ul>
        </nav>
    </div>
</header>