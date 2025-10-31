<?php $images = $args['images'] ?? []; ?>

<section class="hero" itemscope itemtype="https://schema.org/WPHeader">
    <div class="hero__container">
        <div class="hero__text">
            <h2 class="hero__title" itemprop="headline">
                <?= get_field('hero_title') ?: get_the_title() ?>
            </h2>

            <?php if ($subtitle = get_field('hero_subtitle')) : ?>
                <h3 class="hero__subtitle" itemprop="alternativeHeadline"><?= $subtitle ?></h3>
            <?php endif; ?>

            <div class="hero__description" itemprop="description">
            <?php if ($description = get_field('hero_description')) : ?>
                    <?= $description ?>
            <?php endif; ?>
            </div>
        </div>

        <?php if (have_rows('hero_buttons')) : ?>
            <div class="hero__actions">
                <?php while (have_rows('hero_buttons')) : the_row();
                    $button = get_sub_field('link');
                    $style = get_sub_field('style');
                    ?>
                    <a href="<?= $button['url'] ?>"
                       class="hero__action hero__action--<?= $style ?>"
                       itemprop="significantLink"
                       aria-label="<?= __('Aller à la page', 'portfolio-detective').' '.$button['title'] ?>"
                       title="<?=
                       __('Aller à :', 'portfolio-detective').' '.$button['title'] ?>">
                        <?= $button['title'] ?>
                    </a>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if (!empty($images)) : ?>
        <div class="hero__images">
            <figure class="hero__figure">
                <div class="hero__figure--container">
                <?php foreach ($images as $image_id) :
                    $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: '';
                    ?>
                    <div class="hero__figure--box">
                        <div class="hero__figure--box-int">
                        <?php
                        echo wp_get_attachment_image(
                            $image_id,
                            'hero-lg',
                            false,
                            [
                                'class' => 'hero__figure--img',
                                'alt' => $alt,
                                'sizes' => '(max-width: 400px) 100vw, (max-width: 800px) 100vw, 1200px',
                                'srcset' => wp_get_attachment_image_srcset($image_id, 'hero-lg'),
                                'loading' => 'lazy',
                                'itemprop' => 'image'
                            ]
                        );
                        ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </figure>
        </div>
    <?php endif; ?>
</section>