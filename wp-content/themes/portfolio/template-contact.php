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
                <h2 id="contact-title" class="contact__title hidden">Me contacter</h2>

                <div class="contact__grid">
                    <aside class="contact__info">
                        <h3 class="contact__info--title">Mes coordonnées</h3>

                        <ul class="contact__details">
                            <li class="contact__details--item">
                                <strong>Adresse :</strong>
                                <p>4031 Angleur, Belgique</p>
                            </li>
                            <li class="contact__details--item">
                                <strong>Email :</strong>
                                <a href="mailto:camara.mohmd@gmail.com">camara.mohmd@gmail.com</a>
                            </li>
                            <li class="contact__details--item">
                                <strong>Téléphone :</strong>
                                <a href="tel:+32465298377">+32 (0) 465 29 83 77</a>
                            </li>
                            <li class="contact__details--item">
                                <strong>CV :</strong>
                                <?php
                                $cv_file = get_field('cv_file');
                                if ($cv_file) : ?>
                                    <a href="<?= $cv_file['url'] ?>" download class="contact-details__link">
                                        Télécharger mon CV
                                    </a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </aside>

                    <div class="contact__form">
                        <h3 class="contact__form--title">Formulaire de contact</h3>
                        <p class="contact__form--note">(Champs obligatoires)</p>

                        <?php if (isset($_SESSION['contact_form_success'])) : ?>
                            <div class="contact__form--feedback contact__form-success">
                                <?= $_SESSION['contact_form_success']; ?>
                            </div>
                            <?php unset($_SESSION['contact_form_success']); ?>
                        <?php endif; ?>

                        <form method="POST" action="<?= admin_url('admin-post.php'); ?>" class="form">
                            <input type="hidden" name="action" value="submit_contact_form">

                            <div class="contact__form--field">
                                <label for="fullname" class="contact__form--label">Nom Complet <abbr
                                            title="Champs Obligatoire">*</abbr></label>
                                <input type="text" id="fullname" name="fullname" required class="contact__form--input"
                                       value="<?= $_SESSION['contact_form_old']['fullname'] ?? ''; ?>">
                                <?php if (isset($_SESSION['contact_form_errors']['fullname'])) : ?>
                                    <span class="contact__form--error"><?= $_SESSION['contact_form_errors']['fullname']; ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="contact__form--field">
                                <label for="email" class="contact__form--label">Adresse Mail <abbr
                                            title="Champs Obligatoire">*</abbr></label>
                                <input type="email" id="email" name="email" required class="contact__form--input"
                                       value="<?= $_SESSION['contact_form_old']['email'] ?? ''; ?>">
                                <?php if (isset($_SESSION['contact_form_errors']['email'])) : ?>
                                    <span class="contact__form--error"><?= $_SESSION['contact_form_errors']['email']; ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="contact__form--field">
                                <label for="subject" class="contact__form--label">Sujet <abbr
                                            title="Champs Obligatoire">*</abbr></label>
                                <select id="subject" name="subject" required class="contact__form--select">
                                    <option value="">Sélectionnez un sujet...</option>
                                    <option value="Collaboration" <?= isset($_SESSION['contact_form_old']['subject']) && $_SESSION['contact_form_old']['subject'] === 'Collaboration' ? 'selected' : ''; ?>>Collaboration</option>
                                    <option value="Question" <?= isset($_SESSION['contact_form_old']['subject']) && $_SESSION['contact_form_old']['subject'] === 'Question' ? 'selected' : ''; ?>>Question</option>
                                    <option value="Recrutement" <?= isset($_SESSION['contact_form_old']['subject']) && $_SESSION['contact_form_old']['subject'] === 'Recrutement' ? 'selected' : ''; ?>>Recrutement</option>
                                    <option value="Autre" <?= isset($_SESSION['contact_form_old']['subject']) && $_SESSION['contact_form_old']['subject'] === 'Autre' ? 'selected' : ''; ?>>Autre</option>
                                </select>
                                <?php if (isset($_SESSION['contact_form_errors']['subject'])) : ?>
                                    <span class="contact__form--error"><?= $_SESSION['contact_form_errors']['subject']; ?></span>
                                <?php endif; ?>
                            </div>

                            <!-- Message -->
                            <div class="contact__form--field">
                                <label for="message" class="contact__form--label">Message <abbr
                                            title="Champs Obligatoire">*</abbr></label>
                                <textarea id="message" name="message" rows="5" required class="contact__form--textarea"><?= $_SESSION['contact_form_old']['message'] ?? ''; ?></textarea>
                                <?php if (isset($_SESSION['contact_form_errors']['message'])) : ?>
                                    <span class="contact__form--error"><?= $_SESSION['contact_form_errors']['message']; ?></span>
                                <?php endif; ?>
                            </div>

                            <button type="submit" class="contact__form--submit button">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>