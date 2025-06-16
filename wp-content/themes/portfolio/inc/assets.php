<?php

function enqueue_assets_from_vite_manifest(): void
{
    $manifestPath = get_theme_file_path('public/.vite/manifest.json');

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);

        // Vérifier et ajouter le fichier JavaScript
        if (isset($manifest['wp-content/themes/portfolio/resources/js/main.js'])) {
            wp_enqueue_script('portfolio',
                get_theme_file_uri('public/'.$manifest['wp-content/themes/portfolio/resources/js/main.js']['file']),
                [], null,
                true);
        }

        // Vérifier et ajouter le fichier CSS
        if (isset($manifest['wp-content/themes/portfolio/resources/css/styles.scss'])) {
            wp_enqueue_style('portfolio',
                get_theme_file_uri('public/'.$manifest['wp-content/themes/portfolio/resources/css/styles.scss']['file']));
        }
    }
}

enqueue_assets_from_vite_manifest();