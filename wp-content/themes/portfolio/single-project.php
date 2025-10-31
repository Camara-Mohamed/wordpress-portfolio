<?php get_header(); ?>

    <main id="main-content" class="main-content" itemscope itemtype="https://schema.org/CreativeWork">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <section class="single__hero">
                <div class="single__hero--container">
                    <a href="<?= home_url(__('/mes-projets', 'portfolio-detective')); ?>" class="single__back"
                       title="<?php _e('Retourner à la liste de mes projets', 'portfolio-detective'); ?>">
                        <?php _e('Retour aux projets', 'portfolio-detective'); ?>
                    </a>
                    <h2 class="single__title" itemprop="name"><?= get_the_title() ?></h2>

                    <div class="single__links">
                        <?php if ($github = get_field('github')) : ?>
                            <a href="<?= $github ?>" class="single__link single__link--github"
                               itemprop="url"
                               title="<?php _e('Lien vers le dépôt du projet', 'portfolio-detective'); ?>">
                                <?php _e('En savoir plus', 'portfolio-detective'); ?>
                            </a>
                        <?php endif; ?>

                        <?php if ($live = get_field('live')) : ?>
                            <a href="<?= $live ?>" class="single__link single__link--live" itemprop="url"
                               title="<?php _e('Voir le projet', 'portfolio-detective'); ?>">
                                <?php _e('Voir le projet', 'portfolio-detective'); ?>
                            </a>
                        <?php else : ?>
                            <span class="single__link single__link--disabled" aria-disabled="true">
                            <?php _e('Projet non disponible', 'portfolio-detective'); ?>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <article class="single__content">
                <h2 class="sro"><?= __('Contenu', 'portfolio-detective'); ?></h2>

                <?php if ($video = get_sub_field('video')) : ?>
                    <div class="single__gallery--item">
                        <video controls>
                            <source src="<?= $video['url']; ?>" type="<?= $video['mime_type']; ?>">
                            <?= __('Votre navigateur ne supporte pas la vidéo.', 'portfolio-detective'); ?>
                        </video>
                    </div>
                <?php endif; ?>

                <?php if (have_rows('sections')) : ?>
                    <?php while (have_rows('sections')) : the_row(); ?>

                        <?php if (get_row_layout() == 'text') : ?>
                            <section class="single__section" itemprop="description">
                                <div class="single__section--container">
                                    <?php if ($title = get_sub_field('title')) : ?>
                                        <h3 class="single__section--title"><?= $title ?></h3>
                                    <?php endif; ?>
                                    <div class="single__section--content">
                                        <?= get_sub_field('content') ?>
                                    </div>
                                </div>
                            </section>

                        <?php elseif (get_row_layout() == 'gallery') : ?>
                            <section class="single__gallery">
                                <h3 class="single__gallery--title"><?php the_sub_field('title'); ?></h3>
                                <div class="single__gallery--container">
                                    <?php
                                    $images = get_sub_field('images');
                                    if ($images) :
                                        foreach ($images as $image) : ?>
                                            <a href="<?= $image['url']; ?>" data-fancybox="gallery" title="<?= __
                                            ('Voir l\'image en plus grand','portfolio-detective'); ?>">
                                                <figure class="single__gallery--item" itemprop="image" itemscope
                                                        itemtype="https://schema.org/ImageObject">
                                                    <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>"
                                                         class="single__gallery--image">
                                                </figure>
                                            </a>
                                        <?php endforeach;
                                    endif; ?>
                                </div>
                            </section>
                        <?php endif; ?>

                    <?php endwhile; ?>
                <?php endif; ?>
            </article>

            <?php get_template_part('templates/partials/projects-related'); ?>

        <?php endwhile; endif; ?>
    </main>

<?php get_footer(); ?>