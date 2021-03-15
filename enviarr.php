<?php
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

$body = "Nombre: " . $nombre . "<br>Correo: " . $correo . "<br>Telefono: " . $telefono . "<br>Mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   // $mail->SMTPDebug = 0;                      // Enable verbose debug output SMTP::DEBUG_SERVER;
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'gaiatechnologiesperu@gmail.com';                     // SMTP username
    $mail->Password   = 'gaia1234';                               // SMTP password
    $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_SMTPS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($correo, 'Ftech');
    $mail->addAddress('gaiatechnologiesperu@gmail.com');     // Add a recipient
    /*$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');*/

    // Attachments
    /*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
*/
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Correo de prueba de PHPMailer';
    $mail->Body    = $body;
    $mail->Charset = 'UTF-8';
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo '<script>
           alert("El mensaje se envió correctamente");
           window.history.go(-1);
          </script>';
} catch (Exception $e) {
    echo "No se pudo enviar el mensaje. Error de envío: {$mail->ErrorInfo}";
}