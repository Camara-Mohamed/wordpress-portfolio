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
                <p>Aucun contenu trouvé.</p>
            </section>
        <?php endif; ?>
    </main>

<?php get_footer(); ?>