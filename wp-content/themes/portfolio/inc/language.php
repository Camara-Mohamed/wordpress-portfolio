<?php

// Initialiser les traductions
function portfolio_theme_setup(): void
{
    load_theme_textdomain('portfolio-detective', get_template_directory() . '/locales');
}
add_action('after_setup_theme', 'portfolio_theme_setup');

function dw_get_languages(): array
{
    if (!function_exists('pll_the_languages')) {
        return [];
    }

    $current_lang = pll_current_language();
    $other_lang = ($current_lang == 'fr') ? 'en' : 'fr';

    // Récupérer les infos de la langue
    $polylangs = pll_the_languages([
        'echo' => false,
        'raw' => true,
        'hide_if_empty' => false,
        'hide_current' => true,
        'post_id' => get_the_ID()
    ]);

    if (isset($polylangs[$other_lang])) {
        $lang = new stdClass();
        $lang->url = $polylangs[$other_lang]['url'];
        $lang->code = $other_lang;
        $lang->label = $polylangs[$other_lang]['name'];
        $lang->locale = $polylangs[$other_lang]['locale'];

        return [$lang];
    }

    return [];
}

function dw_translated_url($path): ?string
{
    if (function_exists('pll_home_url')) {
        return pll_home_url($path);
    }

    return home_url($path);
}