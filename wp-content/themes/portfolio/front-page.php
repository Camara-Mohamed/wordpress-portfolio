<?php get_header(); ?>

    <main id="main-content" class="main-content" role="main">
        <?php get_template_part('templates/partials/section-hero'); ?>

        <section class="featured" aria-labelledby="featured__title">
                <h2 id="featured__title" class="featured__container--title sro" aria-level="2">
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

                        <article class="featured__more">
                            <h3 class="sro"><?php _e('Voir plus de projets') ?></h3>
                            <div class="featured__more--content">
                                <a href="<?= home_url(__('/mes-projets', 'portfolio-detective')); ?>"
                                   class="featured__more--link"
                               aria-label="<?php _e('Voir la liste de mes projets', 'portfolio-detective'); ?>"
                               title="<?php _e('Voir tous mes projets', 'portfolio-detective'); ?>">
                                <?php _e('Voir tous mes projets', 'portfolio-detective'); ?>
                                </a>
                            </div>
                        </article>
                    </div>
                <?php else : ?>
                    <p class="featured__empty">
                        <?php _e('Aucun projet pour le moment.', 'portfolio-detective'); ?>
                    </p>
                <?php endif; ?>
        </section>
    </main>

<?php get_footer(); ?>