<?php
/**
 * Template Name: Mes Projets
 */

$current_page = max(1, get_query_var('paged') ?: get_query_var('page'));
?>

<?php get_header(); ?>

    <main id="main-content" class="main-content">
        <?php get_template_part('templates/partials/section-hero'); ?>
        <section class="projects__filters">
            <h3 class="projects__filters--title sro">
                <?php _e('Les filtres', 'portfolio-detective'); ?>
            </h3>

            <?php
            $terms = get_terms([
                'taxonomy' => 'type-project',
                'hide_empty' => true,
                'lang' => pll_current_language()
            ]);

            if ($terms) : ?>
            <ul class="filter__list">
                <li class="filter__list--item <?= !isset($_GET['filter']) ? 'active' : '' ?>">
                    <a class="filter__list--link" href="<?= __('/mes-projets', 'portfolio-detective'); ?>"
                       title="<?php _e('Voir tous les projets', 'portfolio-detective'); ?>">
                        <?php _e('Tous', 'portfolio-detective'); ?>
                    </a>
                </li>

                <?php foreach ($terms as $term) : ?>
                    <li class="filter__list--item <?= isset($_GET['filter']) && $_GET['filter'] === $term->slug ? 'active' : '' ?>">
                        <a href="<?= 'filter', $term->slug, get_post_type_archive_link('project') ?>"
                           class="filter__list--link"
                           title="<?= __('Voir les %s', 'portfolio-detective'), $term->name; ?>">
                            <?= $term->name; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </section>

        <section class="projects">
            <h2 class="projects--title sro">
                <?php _e('Mes projets', 'portfolio-detective'); ?>
            </h2>

                <section class="projects__grid">
                <h3 class="projects__grid--title sro">
                    <?php _e('Les projets', 'portfolio-detective'); ?>
                </h3>

                <?php
                $paged = max(1, get_query_var('paged'));
                $args = [
                    'post_type' => 'project',
                    'posts_per_page' => 5,
                    'paged' => $paged,
                    'lang' => pll_current_language(),
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

                    <article class="projets__coming">
                        <h3 class="sro"><?php _e('D\'autres projets arrivent') ?></h3>
                        <div class="projets__coming--content">
                            <p class="projets__coming--text">?</p>
                        </div>
                    </article>
                <?php else : ?>
                    <div class="no-projects">
                        <p><?php _e('Aucun projet trouvé.', 'portfolio-detective'); ?></p>
                    </div>
                <?php endif; ?>
            </section>

            <div class="pagination">
                <?php echo paginate_links([
                    'total' => $projects->max_num_pages,
                    'current' => $current_page,
                    'prev_text' => '<span class="pagination__arrow--left">«</span> '.__('Précédent',
                            'portfolio-detective'),
                    'next_text' => __('Suivant',
                            'portfolio-detective').' <span class="pagination__arrow--right">»</span>',
                ]); ?>
            </div>
        </section>
    </main>

<?php get_footer(); ?>