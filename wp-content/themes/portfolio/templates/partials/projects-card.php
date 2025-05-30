<article class="project__card" itemscope itemtype="https://schema.org/CreativeWork">
    <a href="<?php the_permalink(); ?>" class="project__card--link" itemprop="url">
        <div class="project__card--content" itemprop="description">
            <h4 class="card__title" itemprop="name"><?php the_title(); ?></h4>

            <?php if ($subtitle = get_field('subtitle')) : ?>
                <p class="card__subtitle" itemprop="alternativeHeadline">
                    <?php echo $subtitle; ?>
                </p>
            <?php endif; ?>

            <div class="card__meta">
                <?php if ($tools = get_field('tools')) : ?>
                    <span class="card__tools" itemprop="keywords">
                        <?php echo implode(', ', $tools); ?>
                    </span>
                <?php endif; ?>

                <?php
                $project_types = get_the_terms($post->ID, 'type-project');
                if ($project_types) :
                    foreach ($project_types as $type) : ?>
                        <span class="card__type" itemprop="genre">
                            <p class="project-card__type">
                                    <?= $type->name ?>
                                </p>
                        </span>
                    <?php endforeach;
                endif; ?>
            </div>
        </div>
    </a>
</article>