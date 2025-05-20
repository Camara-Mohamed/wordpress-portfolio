<?php get_header(); ?>

    <main id="main-content" class="main-content" role="main">
        <section class="error-404" aria-labelledby="error__title">

                <h2 id="error-title" class="error-404__title">Erreur 404</h2>
                <div class="error-404--container">
                <div class="error-404__content">
                    <p class="error-404__text">La page que vous recherchez n'a pas pu être trouvée. Elle a peut-être
                        été déplacée ou supprimée.</p>

                    <div class="error-404__actions">
                        <a href="<?= home_url('/'); ?>" class="error-404__action button button__primary">
                            Retour à l'accueil
                        </a>
                        <a href="<?= home_url('/mes-projets'); ?>" class="error-404__button
                        button button__secondary">
                            Voir mes projets
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>