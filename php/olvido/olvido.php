<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

include "../conexiones/conexioncuenta.php";
include "../direcciones/url.php";

$correo = $_POST['correo'];

$sql = "SELECT * FROM cuentas WHERE Correo = '$correo'";
$res = mysqli_query($conexion, $sql);
$enc = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
    <title>Exito enviar</title>
</head>

<body>
<?php
    if (isset($enc['Correo'])) {

        $para = $enc['Correo'];

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'nelsonmouatvergara@gmail.com';                     // SMTP username
            $mail->Password   = 'xzhsmmaehfzkloay';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('nelsonmouatvergara@gmail.com', 'Tinplanta');
            $mail->addAddress($para);

            // Content
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Tinplanta olvido la contraseña';
            $mail->Body    = "<h1>Tinplanta olvido la contraseña</h1>
            Haga clic: <a href='$local/php/olvido/cambiarcont.php?cor=$para'>Renicia la contraseña</a>";

            $mail->send();
            echo "<center><h1>Mensaje enviado exito</h1>
            <a href='../../index.php'><button type='button' class='btn btn-primary'>Volver</button></a></center>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "<center>
            <p>
            <h1 class='display-4'>Mmm.. Pacere no esta en tu cooreo</h1>
            <a href='../../index.php'><button type='button' class='btn btn-primary'>Volver</button></a>
            </p>
            </center>";
    }
    ?>
</body>

</html>
