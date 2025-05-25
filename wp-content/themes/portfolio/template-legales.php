<?php
/**
 * Template Name: Mentions Légales
 */
?>

<?php get_header(); ?>

    <main id="main-content" class="main-content" role="main">
        <?php get_template_part('templates/partials/section-hero'); ?>

        <section class="legals" aria-labelledby="legal-title" itemscope itemtype="https://schema.org/WebPage">
            <div class="legals__container" itemprop="mainContentOfPage">
                <h2 id="legal-title" class="legal__title hidden" itemprop="headline">
                    <?php _e('Mentions légales', 'portfolio-detective'); ?>
                </h2>

                <?php if (have_rows('sections_mentions')) : ?>
                    <div class="legals__content" itemscope itemtype="https://schema.org/ItemList">
                        <?php while (have_rows('sections_mentions')) : the_row(); ?>
                            <article class="legals__content--paragraph" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <h3 class="legals__paragraph--title" itemprop="name">
                                    <?php the_sub_field('title_legals'); ?>
                                </h3>
                                <div class="legals__paragraph--content" itemprop="description">
                                    <?php the_sub_field('content_legals'); ?>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

<?php get_footer(); ?>