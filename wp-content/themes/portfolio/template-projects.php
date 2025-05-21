<?php
/**
 * Template Name: Mes Projets
 */
?>

<?php get_header(); ?>

    <main id="main-content" class="main-content" role="main">
        <?php get_template_part('templates/partials/section-hero'); ?>

        <section>
            <div class="projets__filters">
                <?php
                $terms = get_terms(['taxonomy' => 'type-project', 'hide_empty' => true]);
                if ($terms) : ?>
                    <ul class="filter__list">
                        <li class="<?= !isset($_GET['filter']) ? 'active' : '' ?>">
                            <a href="<?= get_post_type_archive_link('project') ?>">Tous</a>
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
            <div class="projects__grid">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php get_template_part('templates/partials/projects-card'); ?>
                <?php endwhile; endif; ?>
            </div>

            <div class="projects__more">
                <p>D'autres projets arrivent bientôt...</p>
            </div>
        </section>

    </main>

<?php get_footer(); ?>