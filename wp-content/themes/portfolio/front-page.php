<?php get_header(); ?>

    <main id="main-content" class="main-content" role="main">
        <?php get_template_part('templates/partials/section-hero'); ?>

        <section class="featured" aria-labelledby="featured__title">
            <div class="featured__container">
                <h2 id="featured__title" class="featured__container--title">Projets à la
                    une</h2>

                <?php
                $featured = new WP_Query([
                    'post_type' => 'project',
                    'posts_per_page' => 5,
                    'meta_query' => [[
                        'key' => 'featured',
                        'value' => true
                    ]]
                ]);

                if ($featured->have_posts()) : ?>
                    <div class="projects__grid">
                        <?php while ($featured->have_posts()) : $featured->the_post(); ?>
                            <?php get_template_part('templates/partials/projects-card'); ?>
                        <?php endwhile; ?>
                    </div>

                    <div class="featured__more">
                        <a href="<?= home_url('/mes-projets'); ?>"
                           class="featured__more--link">
                            Voir tous mes projets
                        </a>
                    </div>
                <?php else : ?>
                    <p class="featured__empty">Aucun projet pour le moment.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>

<?php get_footer(); ?>