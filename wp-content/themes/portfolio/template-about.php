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
            <h2 class="timeline__title" aria-level="2"><?php _e('Mon parcours', 'portfolio-detective');
                ?></h2>
            <div class="timeline__container">
                <?php if ($subtitle = get_field('timeline_subtitle')) : ?>
                    <p class="timeline__container--subtitle"><?= $subtitle ?></p>
                <?php endif; ?>

                <?php if (have_rows('timeline')) : ?>
                    <div class="timeline__items">
                        <?php while (have_rows('timeline')) : the_row(); ?>
                            <div class="timeline__list">
                                <time class="timeline__list--period"><?= get_sub_field('period') ?></time>
                                <div class="timeline__list--content">
                                    <h3><?= get_sub_field('activity') ?></h3>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="skills" aria-labelledby="skills-title">
            <h2 class="skills__title" aria-level="2"><?php _e('Mes compétences', 'portfolio-detective');
                ?></h2>
            <div class="skills__container">
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
                                        <div class="skill__item--box">
                                            <h4><?= get_sub_field('name') ?></h4>
                                            <?= wp_get_attachment_image(
                                                get_sub_field('icon'),
                                                'thumbnail',
                                                false,
                                                ['alt' => get_sub_field('name')]
                                            ) ?>
                                        </div>
                                        <p><?= get_sub_field('description') ?></p>
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
                                        <div class="skill__item--box">
                                            <h4><?= get_sub_field('name') ?></h4>
                                            <?= wp_get_attachment_image(
                                                get_sub_field('icon'),
                                                'thumbnail',
                                                false,
                                                ['alt' => get_sub_field('name')]
                                            ) ?>
                                        </div>
                                        <p><?= get_sub_field('description') ?></p>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="methodology" aria-labelledby="methodology-title">
            <h2 class="methodology__title"><?php _e('Ma méthodologie', 'portfolio-detective'); ?></h2>
            <div class="methodology__container">
                <?php if ($subtitle = get_field('methodology_subtitle')) : ?>
                    <p class="methodology__container--subtitle"><?= $subtitle ?></p>
                <?php endif; ?>

                <?php if (have_rows('methodology_steps')) : ?>
                    <div class="methodology__steps">
                        <?php while (have_rows('methodology_steps')) : the_row(); ?>
                            <div class="step">
                                <h4 class="step__number"><?= get_sub_field('number') ?></h4>
                                <div class="step__content">
                                    <h4><?= get_sub_field('title') ?></h4>
                                    <p><?= get_sub_field('description') ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

<?php get_footer(); ?>