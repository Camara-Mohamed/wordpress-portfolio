<?php

function dw_handle_contact_form() {

    // Initialiser les données de session
    $_SESSION['contact_form_old'] = $_POST;
    $_SESSION['contact_form_errors'] = [];

    // Validation
    $errors = [];

    if (empty($_POST['fullname'])) {
        $errors['fullname'] = __('Veuillez entrer votre nom complet', 'portfolio-detective');
    }

    if (empty($_POST['email'])) {
        $errors['email'] = __('Veuillez entrer votre email', 'portfolio-detective');
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = __('Adresse email invalide', 'portfolio-detective');
    }

    $allowed_subjects = ['Collaboration', 'Question', 'Recrutement', 'Autre'];
    if (empty($_POST['subject']) || !in_array($_POST['subject'], $allowed_subjects)) {
        $errors['subject'] = __('Veuillez sélectionner un sujet valide', 'portfolio-detective');
    }

    if (empty($_POST['message'])) {
        $errors['message'] = __('Veuillez entrer votre message', 'portfolio-detective');
    }

    // Si erreurs, rediriger avec les messages
    if (!empty($errors)) {
        $_SESSION['contact_form_errors'] = $errors;
        wp_safe_redirect(wp_get_referer());
        exit;
    }

    // Nettoyage des données
    $fullname = sanitize_text_field($_POST['fullname']);
    $email = sanitize_email($_POST['email']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);

    // Sauvegarde en base
    wp_insert_post([
        'post_type' => 'contact_message',
        'post_title' => $fullname . ' - ' . $subject,
        'post_content' => "Email: $email\n\nMessage:\n$message",
        'post_status' => 'publish',
    ]);

    // Envoi d'email
    $to = get_option('admin_email');
    $email_subject = sprintf(
        __('Nouveau message de contact: %s', 'portfolio-detective'),
        $subject
    );
    $email_message = sprintf(
        __("Nom: %s\nEmail: %s\nSujet: %s\n\nMessage:\n%s", 'portfolio-detective'),
        $fullname,
        $email,
        $subject,
        $message
    );

    wp_mail($to, $email_subject, $email_message);

    // Message de succès
    $_SESSION['contact_form_success'] = __('Merci pour votre message! Nous vous répondrons dès que possible.', 'portfolio-detective');
    unset($_SESSION['contact_form_old']);
    unset($_SESSION['contact_form_errors']);

    wp_safe_redirect(wp_get_referer());
    exit;
}