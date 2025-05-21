<article class="project__card">
    <a href="<?php the_permalink(); ?>" class="project__card--link">
        <div class="project__card--content">
            <h3 class="card__title"><?php the_title(); ?></h3>

            <?php if ($subtitle = get_field('subtitle')) : ?>
                <p class="card__subtitle"><?= $subtitle ?></p>
            <?php endif; ?>

            <div class="card__meta">
                <?php if ($tools = get_field('tools')) : ?>
                    <span class="card__tools">
                        <?php foreach ($tools as $tool) : ?>
                            <span class="project__tool"><?= $tool ?></span>
                        <?php endforeach; ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </a>
</article>