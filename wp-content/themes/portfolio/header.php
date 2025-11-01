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
          back-end, full-stack, HEPL, technique graphique, étudiant, wordpress, html, css, javascript',
                  'portfolio-detective') ?>">
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
    if (is_front_page() || is_home()) {
        echo esc_attr(get_bloginfo('name').' - '.get_bloginfo('description'));
    } else {
        echo esc_attr(wp_title('', false).' - '.get_bloginfo('name'));
    }
    ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= home_url($_SERVER['REQUEST_URI']) ?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:image"
          content="<?= get_template_directory_uri().'/resources/svg/logo-simple.svg'; ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head(); ?>

    <!-- Font : Special Elite -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">

    <!-- FancyBox : Pour que chaque image soit cliquable et qu'on puisse la voir en grand -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox/fancybox.css"/>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox/fancybox.umd.js" defer></script>

    <!-- JavaScript -->
    <script src="/wp-content/themes/portfolio/resources/js/main.js" defer type="module"></script>

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

<h1 class="sro"><?= get_the_title(); ?></h1>

<a class="skip__link" href="#main-content"><?php _e('Aller au contenu principal', 'portfolio-detective')
    ?></a>

<header id="header" class="header">
    <div class="header__container">
        <nav class="header__nav" aria-label="<?php _e('Navigation principale', 'portfolio-detective'); ?>">
            <h2 class="sro"><?php _e('Navigation principale',
                        'portfolio-detective'); ?></h2>
            <a class="header__nav--title" href="<?= home_url('/'); ?>" itemprop="url"
               title="<?php _e('Aller à la page d\'accueil');
               ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" viewBox="0 0 51 51" fill="none">
                    <g clip-path="url(#clip0_487_768)">
                        <path d="M11.7219 25.5C11.7219 18.1132 17.7615 12.1245 25.2112 12.1245V0.5C11.2876 0.5 0 11.6924 0 25.5C0 39.3076 11.2876 50.5 25.2127 50.5V38.877C17.7631 38.877 11.7234 32.8883 11.7234 25.5015L11.7219 25.5Z"
                              fill="#F5E8C9"/>
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
                <span class="sro"><?php _e('Menu principal', 'portfolio-detective'); ?></span>
                <svg class="burger-icon" viewBox="0 0 448 512" width="35" height="35">
                    <path fill="currentColor"
                          d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/>
                </svg>
                <svg class="close-icon" viewBox="0 0 384 512" width="35" height="35">
                    <path fill="currentColor"
                          d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
                </svg>
            </label>

            <ul class="header__nav--container">
                <?php foreach (portfolio_get_navigation_links('header') as $link): ?>
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
                    <?php foreach (portfolio_get_languages() as $lang): ?>
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
    <div class="lampe" title="<?= __("Cliquer pour allumer ou éteindre la lampe", "portfolio-detective"); ?>">
        <img class="lampe__image lampe__on" alt="<?= __("Lampe éteinte", "portfolio-detective"); ?>"
             src="/wp-content/themes/portfolio/resources/svg/lampe-on.svg">

        <p class="lampe__button--on lampe__button sro"><?= __("Allumer", "portfolio-detective"); ?></p>
        <p class="lampe__button--off lampe__button"><?= __("Éteindre", "portfolio-detective"); ?></p>
    </div>
</header>