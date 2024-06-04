<?php echo htmlspecialchars($_POST['refuge']);?> 
<?php echo htmlspecialchars($_POST['dateDebut']);?>
<?php echo htmlspecialchars($_POST['dateFin']);?>
<?php echo htmlspecialchars($_POST['prenom']);?>
<?php echo htmlspecialchars($_POST['nom']);?>
<?php echo htmlspecialchars($_POST['email']);?>
<?php echo htmlspecialchars($_POST['nbPersonne']);?>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $refuge = htmlspecialchars($_POST['refuge']);
    $dateDebut = htmlspecialchars($_POST['dateDebut']);
    $dateFin = htmlspecialchars($_POST['dateFin']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $nbPersonne = htmlspecialchars($_POST['nbPersonne']);
  
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'magasword22universe@gmail.com';
        $mail->Password   = 'ukaztryxwlphxeup';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('magasword22universe@gmail.com', 'FormTransfer');
        $mail->addAddress("$email", 'Nom du destinataire');
        
$mail->SMTPDebug = 2; // Niveau de débogage : 2 pour des informations détaillées
        $mail->isHTML(true);
        $mail->Subject = "Reservation $refuge ";
        $mail->Body    = "Bonjour, votre réservation au nom de $prenom  $nom du $dateDebut au $dateFin à $refuge pour $nbPersonne personne(s) à été confirmée";

        $mail->send();
        echo 'La confirmation a été envoyée avec succès.';
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi du message : {$mail->ErrorInfo}";
    }
} else {
    echo 'Mauvaise méthode de requête.';
}
?>