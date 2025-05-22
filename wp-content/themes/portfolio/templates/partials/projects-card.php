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
                        <?= implode(', ', $tools) ?>
                    </span>
                <?php endif; ?>

                <?php

                $project_type = get_the_terms($post->ID, 'type-project');

                if ($project_type) {
                    $type = reset($project_type);

                    $filter_url = add_query_arg(
                        'filter',
                        $type->slug,
                        get_permalink(get_page_by_path('mes-projets'))
                    );

                    echo '<span class="card__type">';
                    printf(
                        '<a href="%s" class="project-card__type">%s</a>',
                        $filter_url, $type->name
                    );
                    echo '</span>';
                }
                ?>

            </div>
        </div>
    </a>
</article>