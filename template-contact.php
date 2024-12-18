<?php
/* Template Name: contact */
get_header();
// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = htmlspecialchars($_POST['mail']); // Récupérer le mail
    $objet = htmlspecialchars($_POST['objet']);
    $message = htmlspecialchars($_POST['message']);
    $to = "robertmaugan@gmail.com"; // Remplacez par votre adresse Gmail
    $subject = "Nouveau message depuis le formulaire : $objet";
    $body = "Mail : $mail\n\nMessage :\n$message";
    $headers = "From: $mail";

    // Envoi du mail
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Votre message a été envoyé avec succès !');</script>";
    } else {
        echo "<script>alert('Une erreur est survenue. Veuillez réessayer.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <div class="all-contact">
        <p class="txt-contact"><strong>N'hésitez pas à me laisser un message pour toute demande ou autre sujet.</strong><br>
           Je suis actuellement disponible pour un stage de fin mars à début juin, ainsi que pour une alternance à partir de septembre 2025. Si vous avez apprécié mon travail, vos retours sont également les bienvenus et seront grandement appréciés !</p>
        
           <section id="contact" class="contact-section">
  <div class="container">
    <div class="contact-content">
      <div class="formulaire">
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
          <input type="hidden" name="action" value="submit_contact_form"> <!-- Action WordPress -->

          
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Votre email..." required>

          <label for="nom">Objet</label>
          <input type="text" id="objet" name="objet" placeholder="Le sujet de votre message..." required>

          <label for="message">Message</label>
          <textarea id="message" name="message" placeholder="Votre message..." rows="5" required></textarea>
    <div class="button-contact">
          <button type="submit">ENVOYER</button>
    </div>
        </form>
      </div>
    </div>
  </div>
</section>
    </div>
</body>
</html>
<?php
get_footer();
?>
