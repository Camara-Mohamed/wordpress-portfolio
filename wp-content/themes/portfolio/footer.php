<div id="scroll">
    <p class="scroll__content"><abbr class="scroll__content--change" title="<?= __('Le pourcentage du scroll de la page', 'portfolio-detective')
        ?>">0%</abbr></p>
</div>

<footer class="footer">
    <div class="footer__container">
        <h2 class="sro" aria-level="2"><?php _e('Navigation de pied de page', 'portfolio-detective'); ?></h2>
        <section class="footer__section">
            <h3 class="sro"><?php _e('Mes informations', 'portfolio-detective'); ?></h3>
            <a class="footer__title" href="<?= home_url('/'); ?>" itemprop="url"
               title="<?php _e('Aller à la page d\'accueil');
               ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                    <g clip-path="url(#clip0_487_894)">
                        <path d="M9.19365 20C9.19365 14.0906 13.9306 9.2996 19.7735 9.2996V0C8.85301 0 0 8.95389 0 20C0 31.0461 8.85301 40 19.7747 40V30.7016C13.9318 30.7016 9.19483 25.9106 9.19483 20.0012L9.19365 20Z"
                              fill="#2A2118"/>
                        <path d="M40 40V28.8426V19.5442H30.8052H19.7747V28.8426H30.8052V40H40Z" fill="#C1272D"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_487_894">
                            <rect width="40" height="40" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
                Mohamed Camara
            </a>
            <div class="footer__contact">
                <div class="footer__contact--content">
                <h4 class="title"><?php _e('Contactez-moi', 'portfolio-detective'); ?></h4>
                    <p><?php _e('Mon profil vous intéresse ?',
                        'portfolio-detective'); ?></p>
                </div>
                <a href="<?= home_url(__('/me-contacter', 'portfolio-detective')); ?>" class="footer__contact--button"
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

        <aside class="footer__aside">
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
        <a href="<?= home_url(__('/mentions-legales', 'portfolio-detective')); ?>" class="footer__legal--link"
           itemprop="usageInfo"
           aria-label="<?php _e('Aller à la page des mentions légales', 'portfolio-detective'); ?>"
           title="<?php _e('Aller aux mentions légales', 'portfolio-detective'); ?>">
            <?php _e('Mentions légales', 'portfolio-detective'); ?>
        </a>
    </article>
</footer>
</body>
</html>