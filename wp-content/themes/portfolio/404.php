<?php get_header(); ?>

    <main id="main-content" class="main-content" role="main">
        <section class="error-404" aria-labelledby="error-title">
            <div class="error-404__container">
                <div class="error-404__content">
            <h2 id="error-title" class="error-404__title"><?php _e('Erreur 404', 'portfolio-detective'); ?></h2>
                    <p class="error-404__text">
                        <?php _e('La page que vous recherchez n\'a pas pu être trouvée. Elle a peut-être été déplacée ou supprimée.', 'portfolio-detective'); ?>
                    </p>

                    <div class="error-404__actions">
                        <a href="<?= dw_translated_url('/'); ?>" class="error-404__action button button__primary"
                           aria-label="<?php _e('Revenir à la page d\'accueil', 'portfolio-detective'); ?>"
                           title="<?php _e('Revenir à l\'accueil', 'portfolio-detective'); ?>">
                            <?php _e('Retour à l\'accueil', 'portfolio-detective'); ?>
                        </a>
                        <a href="<?= dw_translated_url('/mes-projets'); ?>"
                           class="error-404__button button button__secondary"
                           aria-label="<?php _e('Voir la liste de mes projets', 'portfolio-detective'); ?>"
                           title="<?php _e('Voir tous mes projets', 'portfolio-detective'); ?>">
                            <?php _e('Voir mes projets', 'portfolio-detective'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>