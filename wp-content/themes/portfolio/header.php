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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
</head>
<body itemscope itemtype="https://schema.org/Person">

<noscript>
    <p class="no-js__message">
        <?php _e('Pour accéder à toutes les fonctionnalités de ce site, vous devez activer JavaScript.',
            'portfolio-detective') ?> <br>
        <?php _e('Voici les', 'portfolio-detective') ?> <a href="https://www.enable-javascript.com/fr/" hreflang="fr"
                                                          title="<?= __
                                                          ('vers le site enable-javascript',
                                                              'portfolio-detective') ?>"><?php _e('instructions pour activer JavaScript dans votre navigateur Web') ?></a>.
    </p>
</noscript>

<h1 class="sro" role="heading" aria-level="1"><?= get_the_title(); ?></h1>

<a class="skip__link" href="#main-content"><?php _e('Aller au contenu principal', 'portfolio-detective')
    ?></a>

<header id="header" class="header">
    <div class="header__container">
        <nav class="header__nav" aria-label="<?php _e('Navigation principale', 'portfolio-detective'); ?>"
             role="navigation">
            <h2 class="sro" aria-level="2"><?php _e('Navigation principale',
                    'portfolio-detective'); ?></h2>
            <a class="header__nav--title" href="<?= home_url('/'); ?>" itemprop="url"
               title="<?php _e('Aller à la page d\'accueil');
               ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" viewBox="0 0 51 51" fill="none">
                    <g clip-path="url(#clip0_487_768)">
                        <path d="M11.7219 25.5C11.7219 18.1132 17.7615 12.1245 25.2112 12.1245V0.5C11.2876 0.5 0 11.6924 0 25.5C0 39.3076 11.2876 50.5 25.2127 50.5V38.877C17.7631 38.877 11.7234 32.8883 11.7234 25.5015L11.7219 25.5Z" fill="#F5E8C9"/>
                        <path d="M51 50.5V36.5533V24.9303H39.2766H25.2127V36.5533H39.2766V50.5H51Z" fill="#C1272D"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_487_768">
                            <rect width="51" height="50" fill="white" transform="translate(0 0.5)"/>
                        </clipPath>
                    </defs>
                </svg>
                <?= get_bloginfo('name') ?>
            </a>

            <input type="checkbox" id="burger-menu" class="sro burger-checkbox" aria-label="Menu principal"/>
            <label for="burger-menu" class="header__nav--burger">
                <span class="burger__line burger__line-1"></span>
                <span class="burger__line burger--line-2"></span>
                <span class="burger__line burger--line-3"></span>
            </label>

            <ul class="header__nav--container">
                <?php foreach (dw_get_navigation_links('header') as $link): ?>
                    <li class="nav__item<?= $link->current ? ' nav__item--current' : '' ?>">
                        <a href="<?= $link->href ?>" class="nav__item--link"
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