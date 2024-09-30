<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use Symfony\Component\Dotenv\Dotenv;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["naam"])) {
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    try {

        // $dotenv = new Dotenv();
        // $dotenv->load(__DIR__ . '/.env');
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kasperheuer@gmail.com';
        $mail->Password = 'Wagtwoort123';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $zeikerEmail = $_POST["email"];
        $zeikerNaam = $_POST["naam"];
        $mail->setFrom('kasperheuer@gmail.com', 'ik');
        $mail->addAddress($zeikerEmail, $zeikerNaam);
        $mail->isHTML(true);
        $mail->Subject = 'Here is the subject';
        $mail->Body = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the plain text version of the email content';
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="indexbackup.php" method="POST" class="Regristreren">
        <label>Naam</label>
        <input type="text" name="naam" required>
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Klacht</label>
        <input type="text" name="klacht" required>
        <input type="submit" value="send">
    </form>

</body>

</html>