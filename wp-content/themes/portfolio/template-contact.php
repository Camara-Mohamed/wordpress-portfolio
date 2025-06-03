<?php
/**
 * Template Name: Me Contacter
 */
?>

<?php get_header(); ?>

    <main id="main-content" class="main-content" role="main">
        <?php get_template_part('templates/partials/section-hero'); ?>

        <section class="contact__section" aria-labelledby="contact-title">
            <div class="contact__container">
                <h2 id="contact-title" class="contact__title sro" aria-level="2"><?php _e('Me contacter',
                        'portfolio-detective'); ?></h2>

                <div class="contact__grid">
                    <aside class="contact__info">
                        <h3 class="contact__info--title"><?php _e('Mes coordonnées', 'portfolio-detective'); ?></h3>

                        <ul class="contact__details">
                            <li class="contact__details--item">
                                <strong><?php _e('Adresse :', 'portfolio-detective'); ?></strong>
                                <p><?php _e('4031 Angleur, Belgique') ?></p>
                            </li>
                            <li class="contact__details--item">
                                <strong><?php _e('Email :', 'portfolio-detective'); ?></strong>
                                <a href="mailto:camara.mohmd@gmail.com" title="<?php
                                _e('Envoyer un mail', 'portfolio-detective');
                                ?>">camara.mohmd@gmail.com</a>
                            </li>
                            <li class="contact__details--item">
                                <strong><?php _e('Téléphone :', 'portfolio-detective'); ?></strong>
                                <a href="tel:+32465298377" title="<?php
                                _e('Appeler à ce numèro', 'portfolio-detective');
                                ?>">+32 (0) 465 29 83 77</a>
                            </li>
                            <li class="contact__details--item">
                                <strong><?php _e('CV :', 'portfolio-detective'); ?></strong>
                                <?php
                                $cv_file = get_field('cv_file');
                                if ($cv_file) : ?>
                                    <a href="<?= $cv_file['url'] ?>" download class="contact__details--link"
                                       title="<?php
                                    _e('Télécharger mon CV', 'portfolio-detective');
                                    ?>">
                                        <?php _e('Télécharger mon CV', 'portfolio-detective'); ?>
                                    </a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </aside>

                    <div class="contact__form">
                        <h3 class="contact__form--title"><?php _e('Formulaire de contact',
                                'portfolio-detective'); ?></h3>
                        <p class="contact__form--note"><abbr title="<?php _e('Champs Obligatoire', 'portfolio-detective'); ?>">*</abbr> <?php _e('(Champs obligatoires)', 'portfolio-detective');
                        ?></p>

                        <?php if (isset($_SESSION['contact_form_success'])) : ?>
                            <div class="contact__form--feedback contact__form-success">
                                <?= $_SESSION['contact_form_success']; ?>
                            </div>
                            <?php unset($_SESSION['contact_form_success']); ?>
                        <?php endif; ?>

                        <form method="POST" action="<?= admin_url('admin-post.php'); ?>" class="form">
                            <input type="hidden" name="action" value="submit_contact_form">

                            <fieldset>
                                <div class="contact__form--field">
                                    <label for="fullname" class="contact__form--label">
                                        <?php _e('Nom Complet', 'portfolio-detective'); ?>
                                        <abbr title="<?php _e('Champs Obligatoire', 'portfolio-detective'); ?>">*</abbr>
                                    </label>
                                    <input type="text" id="fullname" name="fullname" required
                                           class="contact__form--input"
                                           value="<?= $_SESSION['contact_form_old']['fullname'] ?? ''; ?>"
                                           placeholder="<?= __('Alessio Adam', 'portfolio-detective') ?>">
                                    <?php if (isset($_SESSION['contact_form_errors']['fullname'])) : ?>
                                        <span class="contact__form--error"><?= $_SESSION['contact_form_errors']['fullname']; ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="contact__form--field">
                                    <label for="email" class="contact__form--label">
                                        <?php _e('Adresse Mail', 'portfolio-detective'); ?>
                                        <abbr title="<?php _e('Champs Obligatoire', 'portfolio-detective'); ?>">*</abbr>
                                    </label>
                                    <input type="email" id="email" name="email" required class="contact__form--input"
                                           value="<?= $_SESSION['contact_form_old']['email'] ?? ''; ?>" placeholder="<?=
                                    __('alessio.adam@gmail.com', 'portfolio-detective')
                                    ?>">
                                    <?php if (isset($_SESSION['contact_form_errors']['email'])) : ?>
                                        <span class="contact__form--error"><?= $_SESSION['contact_form_errors']['email']; ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="contact__form--field">
                                    <label for="subject" class="contact__form--label">
                                        <?php _e('Sujet', 'portfolio-detective'); ?>
                                        <abbr title="<?php _e('Champs Obligatoire', 'portfolio-detective'); ?>">*</abbr>
                                    </label>
                                    <select id="subject" name="subject" required class="contact__form--select">
                                        <option value=""><?php _e('Sélectionnez un sujet...',
                                                'portfolio-detective'); ?></option>
                                        <option value="Collaboration" <?= isset($_SESSION['contact_form_old']['subject']) && $_SESSION['contact_form_old']['subject'] === 'Collaboration' ? 'selected' : ''; ?>>
                                            <?php _e('Collaboration', 'portfolio-detective'); ?>
                                        </option>
                                        <option value="Question" <?= isset($_SESSION['contact_form_old']['subject']) && $_SESSION['contact_form_old']['subject'] === 'Question' ? 'selected' : ''; ?>>
                                            <?php _e('Question', 'portfolio-detective'); ?>
                                        </option>
                                        <option value="Recrutement" <?= isset($_SESSION['contact_form_old']['subject']) && $_SESSION['contact_form_old']['subject'] === 'Recrutement' ? 'selected' : ''; ?>>
                                            <?php _e('Recrutement', 'portfolio-detective'); ?>
                                        </option>
                                        <option value="Autre" <?= isset($_SESSION['contact_form_old']['subject']) && $_SESSION['contact_form_old']['subject'] === 'Autre' ? 'selected' : ''; ?>>
                                            <?php _e('Autre', 'portfolio-detective'); ?>
                                        </option>
                                    </select>
                                    <?php if (isset($_SESSION['contact_form_errors']['subject'])) : ?>
                                        <span class="contact__form--error"><?= $_SESSION['contact_form_errors']['subject']; ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="contact__form--field">
                                    <label for="message" class="contact__form--label">
                                        <?php _e('Message', 'portfolio-detective'); ?>
                                        <abbr title="<?php _e('Champs Obligatoire', 'portfolio-detective'); ?>">*</abbr>
                                    </label>
                                    <textarea id="message" name="message" rows="8" required
                                              class="contact__form--textarea" placeholder="<?= __('Écrivez-moi un message ici…', 'portfolio-detective')
                                    ?>"><?=
                                            $_SESSION['contact_form_old']['message'] ?? ''; ?></textarea>
                                    <?php if (isset($_SESSION['contact_form_errors']['message'])) : ?>
                                        <span class="contact__form--error"><?= $_SESSION['contact_form_errors']['message']; ?></span>
                                    <?php endif; ?>
                                </div>
                            </fieldset>

                            <button type="submit" class="contact__form--submit button">
                                <?php _e('Envoyer', 'portfolio-detective'); ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>