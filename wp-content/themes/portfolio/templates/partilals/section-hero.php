<section class="hero" aria-labelledby="hero-title" itemscope itemtype="https://schema.org/WPHeader">
    <div class="hero__container">
        <h2 id="hero-title" class="hero__title" itemprop="headline">
            <?= get_field('hero_title') ?: get_the_title() ?>
        </h2>

        <?php if ($subtitle = get_field('hero_subtitle')) : ?>
            <p class="hero__subtitle" itemprop="alternativeHeadline"><?= $subtitle ?></p>
        <?php endif; ?>

        <?php if ($description = get_field('hero_description')) : ?>
            <div class="hero__description" itemprop="description">
                <?= $description ?>
            </div>
        <?php endif; ?>

        <?php if (have_rows('hero_buttons')) : ?>
            <div class="hero__actions">
                <?php while (have_rows('hero_buttons')) : the_row();
                    $button = get_sub_field('link');
                    $style = get_sub_field('style');
                    ?>
                    <a href="<?= $button['url'] ?>"
                       class="hero__action hero__action--<?= $style ?>"
                       target="<?= $button['target'] ?: '_self' ?>"
                       itemprop="significantLink">
                        <?= $button['title'] ?>
                    </a>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>