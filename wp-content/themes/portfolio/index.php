<?php get_header(); ?>

    <main id="main-content" class="main-content" role="main">
        <?php if (have_posts()) : ?>
            <?php
            while (have_posts()) : the_post();
                the_content();
            endwhile;
            ?>
        <?php else : ?>
            <section class="no-content">
                <p><?php _e('Aucun contenu trouvé.', 'portfolio-detective'); ?></p>
            </section>
        <?php endif; ?>
    </main>

<?php get_footer(); ?>