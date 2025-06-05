<?php

$terms = wp_get_post_terms($post->ID, 'type-project', ['fields' => 'ids']);
if ($terms) :
    $related = new WP_Query([
        'post_type' => 'project',
        'post__not_in' => [$post->ID],
        'posts_per_page' => 3,
        'tax_query' => [[
            'taxonomy' => 'type-project',
            'field' => 'term_id',
            'terms' => $terms
        ]]
    ]);

    if ($related->have_posts()) : ?>
        <section class="related__projects" aria-labelledby="related-projects-title">
            <h2 id="related-projects-title" class="related__projects--title" aria-level="2">
                <?php _e('Projets similaires', 'portfolio-detective'); ?>
            </h2>
            <div class="projects__related--grid">
                <?php while ($related->have_posts()) : $related->the_post(); ?>
                    <?php get_template_part('templates/partials/projects-card'); ?>
                <?php endwhile; ?>
            </div>
        </section>
    <?php endif;
endif; ?>