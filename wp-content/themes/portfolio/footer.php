<footer class="footer" role="contentinfo">
    <div class="footer__container">
        <h2 class="hidden">Navigation de pied de page</h2>
        <section class="footer__section">
            <h3 class="hidden">Mes informations</h3>
            <p class="footer__name">Mohamed Camara</p>
            <div class="footer__contact">
                <h4 class="footer__contact--title">Contactez-moi</h4>
                <p class="footer__contact--content">Mon profil vous intéresse ?</p>
                <a href="<?= home_url('/me-contacter'); ?>" class="footer__contact--button">
                    Me Contacter
                </a>
            </div>
        </section>

        <nav class="footer__nav">
            <h3 class="footer__nav--title">Navigation</h3>
            <?php
            $nav_items = wp_get_nav_menu_items('footer');
            if ($nav_items) : ?>
                <ul class="footer__nav--list">
                    <?php foreach ($nav_items as $item) : ?>
                        <li class="footer__nav--item">
                            <a href="<?php echo $item->url; ?>" class="footer__nav--link">
                                <?php echo $item->title; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </nav>

        <aside class="footer__aside">
            <h3 class="footer__resources--title">Ressources utilisées</h3>
            <?php
            $menu_items = wp_get_nav_menu_items(
                get_nav_menu_locations()['footer-resources'] ?? 0
            );

            if ($menu_items) : ?>
                <ul class="footer__resources--list">
                    <?php foreach ($menu_items as $item) : ?>
                        <li class="footer__resources--item">
                            <a href="<?= $item->url ?>" class="footer__resources--link">
                                <?= $item->title ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </aside>

        <aside class="footer__section">
            <h3 class="footer__sociales--title">Réseaux</h3>
            <?php
            $menu_items = wp_get_nav_menu_items(
                get_nav_menu_locations()['footer-sociales'] ?? 0
            );

            if ($menu_items) : ?>
                <ul class="footer__sociales--list">
                    <?php foreach ($menu_items as $item) : ?>
                        <li class="footer__sociales--item">
                            <a href="<?= $item->url ?>" class="footer__sociales--link">
                                <?= $item->title ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </aside>
    </div>

    <article class="footer__legal" itemscope itemtype="https://schema.org/CreativeWork">
        <h2 class="hidden">Mentions légales</h2>
        <p class="footer__legal--copyright" itemprop="copyrightYear">Copyright © <?= date('Y'); ?> <span
                itemprop="copyrightHolder">Mohamed Camara</span>. Tous droits réservés.</p>
        <a href="<?= home_url('/mentions-legales'); ?>" class="footer__legal--link" itemprop="usageInfo">Mentions
            légales</a>
    </article>
</footer>