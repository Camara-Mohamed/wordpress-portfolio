<article class="project__card" itemscope itemtype="https://schema.org/CreativeWork">
    <a href="<?php the_permalink(); ?>" class="project__card--link" itemprop="url"
       aria-label="<?php _e('Voir le projet :', 'portfolio-detective').' '.the_title(); ?>"
       title="<?php _e('Voir', 'portfolio-detective').' '.the_title(); ?>">
        <div class="project__card--content" itemprop="description">
            <h3 class="card__title" itemprop="name"><?php the_title(); ?></h3>

            <?php if ($subtitle = get_field('subtitle')) : ?>
                <p class="card__subtitle" itemprop="alternativeHeadline">
                    <?php echo $subtitle; ?>
                </p>
            <?php endif; ?>

            <div class="card__data">
                <?php if ($tools = get_field('tools')) : ?>
                    <span class="card__tools" itemprop="keywords">
                        <?php echo implode(', ', $tools); ?>
                    </span>
                <?php endif; ?>

                <div class="card__type" itemprop="genre">
                <?php
                $project_types = get_the_terms($post->ID, 'type-project');
                if ($project_types) :
                    foreach ($project_types as $type) : ?>
                            <p class="card__type--item">
                                    <?= $type->name ?>
                            </p>
                    <?php endforeach;
                endif; ?>
                </div>
            </div>
        </div>
    </a>
</article>