<?php get_header(); ?>

    <main id="main-content" class="main-content" role="main">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <section class="single__hero">
                <div class="single__hero--container">
                    <a href="<?= home_url('/projet') ?>" class="single__back">Retour aux projets</a>
                    <h2 class="single__title" itemprop="name"><?= get_the_title() ?></h2>

                    <?php
                    $terms = get_the_terms(get_the_ID(), 'type-project');
                    if ($terms && !is_wp_error($terms)) : ?>
                        <div class="single__types">
                            <?php foreach ($terms as $term) : ?>
                                <span class="single__type" itemprop="keywords"><?= $term->name ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="single__links">
                        <?php if ($github = get_field('github')) : ?>
                            <a href="<?= $github ?>" class="single__link single__link--github"
                               itemprop="codeRepository">
                                Voir le GitHub
                            </a>
                        <?php endif; ?>

                        <?php if ($live = get_field('live')) : ?>
                            <a href="<?= $live ?>" class="single__link single__link--live"
                               itemprop="url">
                                Voir le projet
                            </a>
                        <?php else : ?>
                            <span class="single__link single__link--disabled">Projet non disponible</span>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <article class="single__content">
                <?php if ($subtitle = get_field('subtitle')) : ?>
                    <section class="single__content--subtitle">
                        <div class="single__content--container">
                            <h2 itemprop="headline"><?= $subtitle ?></h2>
                        </div>
                    </section>
                <?php endif; ?>

                <?php if (have_rows('sections')) : ?>
                    <?php while (have_rows('sections')) : the_row(); ?>

                        <?php if (get_row_layout() == 'text') : ?>
                            <section class="single__section" itemprop="description">
                                <div class="single__section--container">
                                    <?php if ($title = get_sub_field('title')) : ?>
                                        <h3><?= $title ?></h3>
                                    <?php endif; ?>
                                    <div class="single__section--content">
                                        <?= get_sub_field('content') ?>
                                    </div>
                                </div>
                            </section>

                        <?php elseif (get_row_layout() == 'galery') : ?>
                            <section class="single__gallery">
                                <div class="single__gallery--container">
                                    <h3><?php get_sub_field('title') ?></h3>
                                    <figure class="single__gallery--item" itemprop="image" itemscope
                                            itemtype="https://schema.org/ImageObject">
                                    <?php
                                    $images = get_sub_field('images');
                                    if ($images) :
                                        foreach ($images as $image) : ?>
                                                <img src="<?= $image['url'] ?>"
                                                     alt="<?= $image['alt'] ?>"
                                                     itemprop="contentUrl">
                                        <?php endforeach; endif; ?>
                                        <figcaption itemprop="caption"><?php get_sub_field('title') ?></figcaption>
                                    </figure>
                                </div>
                            </section>
                        <?php endif; ?>

                    <?php endwhile; ?>
                <?php endif; ?>
            </article>

        <?php endwhile; endif; ?>

    </main>

<?php get_footer(); ?>