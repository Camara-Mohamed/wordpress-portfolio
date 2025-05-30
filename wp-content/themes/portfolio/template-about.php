<?php
/**
 * Template Name: À propos
 */
?>

<?php get_header(); ?>

    <main id="main-content" class="main-content" role="main">
        <?php
        $hero_args = [
            'images' => [
                get_field('about_image_1'),
                get_field('about_image_2')
            ]
        ];
        get_template_part('templates/partials/section-hero', null, $hero_args);
        ?>

        <section class="timeline" aria-labelledby="timeline-title">
            <div class="timeline__container">
                <h2 id="timeline__container--title" aria-level="2"><?php _e('Mon parcours', 'portfolio-detective');
                    ?></h2>
                <?php if ($subtitle = get_field('timeline_subtitle')) : ?>
                    <p class="timeline__container--subtitle"><?= $subtitle ?></p>
                <?php endif; ?>

                <?php if (have_rows('timeline')) : ?>
                    <div class="timeline__items">
                        <?php while (have_rows('timeline')) : the_row(); ?>
                            <div class="timeline__list">
                                <p class="timeline__item--period"><?= get_sub_field('period') ?></p>
                                <div class="timeline__item--content">
                                    <h3><?= get_sub_field('activity') ?></h3>
                                    <div><?= get_sub_field('description') ?></div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="skills" aria-labelledby="skills-title">
            <div class="skills__container">
                <h2 id="skills__container--title" aria-level="2"><?php _e('Mes compétences', 'portfolio-detective');
                    ?></h2>
                <?php if ($subtitle = get_field('skills_subtitle')) : ?>
                    <p class="skills__container--subtitle"><?= $subtitle ?></p>
                <?php endif; ?>

                <div class="skills__grid">
                    <div class="skill__category">
                        <h3><?php _e('Développement', 'portfolio-detective'); ?></h3>
                        <div class="skills__list">
                            <?php if (have_rows('dev_skills')) : ?>
                                <?php while (have_rows('dev_skills')) : the_row(); ?>
                                    <div class="skill__item">
                                        <?= wp_get_attachment_image(
                                            get_sub_field('icon'),
                                            'thumbnail',
                                            false,
                                            ['alt' => get_sub_field('name')]
                                        ) ?>
                                        <span><?= get_sub_field('name') ?></span>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="skill__category">
                        <h3><?php _e('Design', 'portfolio-detective'); ?></h3>
                        <div class="skills__list">
                            <?php if (have_rows('design_skills')) : ?>
                                <?php while (have_rows('design_skills')) : the_row(); ?>
                                    <div class="skill__item">
                                        <?= wp_get_attachment_image(
                                            get_sub_field('icon'),
                                            'thumbnail',
                                            false,
                                            ['alt' => get_sub_field('name')]
                                        ) ?>
                                        <span><?= get_sub_field('name') ?></span>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="methodology" aria-labelledby="methodology-title">
            <div class="methodology__container">
                <h2 id="methodology__container--title"><?php _e('Ma méthodologie', 'portfolio-detective'); ?></h2>
                <?php if ($subtitle = get_field('methodology_subtitle')) : ?>
                    <p class="methodology__container--subtitle"><?= $subtitle ?></p>
                <?php endif; ?>

                <?php if (have_rows('methodology_steps')) : ?>
                    <div class="methodology__steps">
                        <?php while (have_rows('methodology_steps')) : the_row(); ?>
                            <div class="step">
                                <div class="step__number"><?= get_sub_field('number') ?></div>
                                <div class="step__content">
                                    <h3><?= get_sub_field('title') ?></h3>
                                    <p><?= get_sub_field('description') ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="cta" aria-labelledby="cta-title">
            <div class="container">
                <h2 id="cta__title" aria-level="2"><?php _e('Travaillons ensemble', 'portfolio-detective'); ?></h2>
                <?php if ($subtitle = get_field('cta_subtitle')) : ?>
                    <p class="cta__subtitle"><?= $subtitle ?></p>
                <?php endif; ?>

                <div class="cta__buttons">
                    <a href="<?= dw_translated_url('/me-contacter'); ?>" class="button button__primary" title="<?php
                    _e('Aller sur la page de contact', 'portfolio-detective');
                    ?>">
                        <?php _e('Me contacter', 'portfolio-detective'); ?>
                    </a>
                    <a href="<?= dw_translated_url('/mes-projets'); ?>" class="button button__secondary" title="<?php
                    _e('Aller sur la page de mes projets', 'portfolio-detective');
                    ?>">
                        <?php _e('Voir mes projets', 'portfolio-detective'); ?>
                    </a>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>