<?php
/**
 * Template Name: Mes Projets
 */
?>

<?php get_header(); ?>

    <main id="main-content" class="main-content" role="main">

        <?php get_template_part('templates/partials/section-hero'); ?>

        <section class="projects">
            <div class="projects__filters">
                <?php
                $terms = get_terms([
                    'taxonomy' => 'type-project',
                    'hide_empty' => true
                ]);

                if ($terms) : ?>
                    <ul class="filter__list">
                        <li class="<?= !isset($_GET['filter']) ? 'active' : '' ?>">
                            <a href="<?= home_url('/mes-projets') ?>">Tous</a>
                        </li>
                        <?php foreach ($terms as $term) : ?>
                            <li class="<?= isset($_GET['filter']) && $_GET['filter'] === $term->slug ? 'active' : '' ?>">
                                <a href="<?= add_query_arg('filter', $term->slug, get_post_type_archive_link('project')) ?>">
                                    <?= $term->name ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="projets__grid">
                <?php

                $paged = max(1, get_query_var('paged') ?: get_query_var('page'));
                $args = [
                    'post_type' => 'project',
                    'posts_per_page' => 6,
                    'paged' => $paged,
                    'post_status' => 'publish'
                ];

                if (isset($_GET['filter'])) {
                    $args['tax_query'] = [
                        [
                            'taxonomy' => 'type-project',
                            'field' => 'slug',
                            'terms' => sanitize_text_field($_GET['filter'])
                        ]
                    ];
                }

                $projects = new WP_Query($args);

                if ($projects->have_posts()) :
                    while ($projects->have_posts()) : $projects->the_post();
                        get_template_part('templates/partials/projects-card');
                    endwhile; ?>

                    <div class="projets__coming">
                        <p>?</p>
                    </div>

                    <?php echo '<div class="pagination">';
                    echo paginate_links([
                        'total' => $projects->max_num_pages,
                        'current' => $paged,
                        'prev_text' => __('« Précédent'),
                        'next_text' => __('Suivant »'),
                    ]);
                    echo '</div>';
                else : ?>
                    <div class="no-projects">
                        <p>Aucun projet trouvé.</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

<?php get_footer(); ?>