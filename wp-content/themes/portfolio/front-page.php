<?php get_header(); ?>

    <main id="main-content" class="main-content" role="main">
        <?php get_template_part('templates/partials/section-hero'); ?>

        <section class="featured" aria-labelledby="featured__title">
            <div class="featured__container">
                <h2 id="featured__title" class="featured__container--title hidden">
                    <?php _e('Projets à la une', 'portfolio-detective'); ?>
                </h2>

                <?php
                $featured = new WP_Query([
                    'post_type' => 'project',
                    'post_status' => 'publish',
                    'posts_per_page' => 5,
                    'orderby' => 'date',
                    'order' => 'DESC',
                ]);

                if ($featured->have_posts()) : ?>
                    <div class="projects__grid">
                        <?php while ($featured->have_posts()) : $featured->the_post(); ?>
                            <?php get_template_part('templates/partials/projects-card'); ?>
                        <?php endwhile; ?>
                    </div>

                    <div class="featured__more">
                        <a href="<?= dw_translated_url('/mes-projets'); ?>" class="featured__more--link">
                            <?php _e('Voir tous mes projets', 'portfolio-detective'); ?>
                        </a>
                    </div>
                <?php else : ?>
                    <p class="featured__empty">
                        <?php _e('Aucun projet pour le moment.', 'portfolio-detective'); ?>
                    </p>
                <?php endif; ?>
            </div>
        </section>
    </main>

<?php get_footer(); ?>