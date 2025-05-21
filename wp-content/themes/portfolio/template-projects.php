<?php
/**
 * Template Name: Mes Projets
 */
?>

<?php get_header(); ?>

    <main id="main-content" class="main-content" role="main">
        <?php get_template_part('templates/partials/section-hero'); ?>

        <section>
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