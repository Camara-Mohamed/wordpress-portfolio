<footer class="footer">
    <div class="footer__container">
        <h2 class="sro" aria-level="2"><?php _e('Navigation de pied de page', 'portfolio-detective'); ?></h2>
        <section class="footer__section">
            <h3 class="sro"><?php _e('Mes informations', 'portfolio-detective'); ?></h3>
            <p class="footer__name">Mohamed Camara</p>
            <div class="footer__contact">
                <h4 class="footer__contact--title"><?php _e('Contactez-moi', 'portfolio-detective'); ?></h4>
                <p class="footer__contact--content"><?php _e('Mon profil vous intéresse ?',
                        'portfolio-detective'); ?></p>
                <a href="<?= dw_translated_url('/me-contacter'); ?>" class="footer__contact--button"
                   aria-label="<?php _e('Aller à la page de contact', 'portfolio-detective'); ?>"
                   title="<?php _e('Aller à la page de contact', 'portfolio-detective'); ?>">
                    <?php _e('Me Contacter', 'portfolio-detective'); ?>
                </a>
            </div>
        </section>

        <nav class="footer__nav">
            <h3 class="footer__nav--title"><?php _e('Navigation', 'portfolio-detective'); ?></h3>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'container' => false,
                'items_wrap' => '<ul class="footer__nav--list">%3$s</ul>',
                'fallback_cb' => false
            ]);
            ?>
        </nav>

        <aside class="footer__aside">
            <h3 class="footer__resources--title"><?php _e('Ressources utilisées', 'portfolio-detective'); ?></h3>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer-resources',
                'container' => false,
                'items_wrap' => '<ul class="footer__resources--list">%3$s</ul>',
                'fallback_cb' => false
            ]);
            ?>
        </aside>

        <aside class="footer__section">
            <h3 class="footer__sociales--title"><?php _e('Réseaux', 'portfolio-detective'); ?></h3>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer-sociales',
                'container' => false,
                'items_wrap' => '<ul class="footer__sociales--list">%3$s</ul>',
                'fallback_cb' => false
            ]);
            ?>
        </aside>
    </div>

    <article class="footer__legal" itemscope itemtype="https://schema.org/CreativeWork">
        <h3 class="sro"><?php _e('Mentions légales', 'portfolio-detective'); ?></h3>
        <p class="footer__legal--copyright" itemprop="copyrightYear">
            <?php
            printf(__('Copyright © %1$s %2$s. Tous droits réservés.', 'portfolio-detective'),
                date('Y'),
                '<span itemprop="copyrightHolder">Mohamed Camara</span>'
            );
            ?>
        </p>
        <a href="<?= dw_translated_url('/mentions-legales'); ?>" class="footer__legal--link" itemprop="usageInfo"
           aria-label="<?php _e('Aller à la page des mentions légales', 'portfolio-detective'); ?>"
           title="<?php _e('Aller aux mentions légales', 'portfolio-detective'); ?>">
            <?php _e('Mentions légales', 'portfolio-detective'); ?>
        </a>
    </article>
</footer>
</body>
</html>