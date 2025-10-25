<?php
// === CONFIGURATION ===
$to = "djmrst.officiel@gmail.com"; // 📬 Mets ici l'adresse qui recevra les messages
$subject_prefix = "[Formulaire DJ] "; // Pour l'objet des mails reçus

// === Vérification si le formulaire est envoyé ===
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sécurisation des données reçues
    $name    = htmlspecialchars(trim($_POST["name"]));
    $email   = htmlspecialchars(trim($_POST["email"]));
    $phone   = htmlspecialchars(trim($_POST["phone"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Vérification des champs obligatoires
    if (!empty($name) && !empty($email) && !empty($message)) {

        // Création du contenu du mail
        $subject = $subject_prefix . "Nouveau message de " . $name;
        $body = "Nom: $name\n".
                "Email: $email\n".
                "Téléphone: $phone\n\n".
                "Message:\n$message";

        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Envoi du mail
        if (mail($to, $subject, $body, $headers)) {
            // Message de confirmation simple
            echo "<h2>Merci $name, votre message a bien été envoyé ✅</h2>";
            echo "<a href='index.html'>⬅ Retour au site</a>";
        } else {
            echo "<h2>❌ Une erreur est survenue lors de l'envoi. Veuillez réessayer plus tard.</h2>";
        }

    } else {
        echo "<h2>⚠️ Veuillez remplir tous les champs obligatoires.</h2>";
    }

} else {
    // Si quelqu'un essaie d'accéder à send_mail.php directement
    header("Location: index.html");
    exit;
}
?>
