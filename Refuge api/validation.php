Bonjour <?php echo htmlspecialchars($_POST['prenom']);?> 
<?php echo htmlspecialchars($_POST['nom']);?>,
<?php echo htmlspecialchars($_POST['age']);?> ans, fruit prefere :
<?php echo htmlspecialchars($_POST['fruit']);?>
 ,adresse email : <?php echo htmlspecialchars($_POST['email']);?> tel: <?php echo htmlspecialchars($_POST['tel']);?>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $age = htmlspecialchars($_POST['age']);
    $fruit = htmlspecialchars($_POST['fruit']);
    $email = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['tel']);
  
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
        $mail->addAddress('leger.mattis@gmail.com', 'Nom du destinataire');
        
$mail->SMTPDebug = 2; // Niveau de débogage : 2 pour des informations détaillées
        $mail->isHTML(true);
        $mail->Subject = 'formulaire';
        $mail->Body    = "nouveau formulaire rempli avec les informations suivantes : $prenom  $nom ,$age ans, fruit prefere: $fruit , adresse email: $email, numero de telephone: $tel";

        $mail->send();
        echo 'Le formulaire a été envoyé avec succès.';
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi du message : {$mail->ErrorInfo}";
    }
} else {
    echo 'Mauvaise méthode de requête.';
}
?>