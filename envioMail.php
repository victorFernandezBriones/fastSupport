<?php

if ($_POST) {
    //VARIABLES
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);
    $correo = "vi.fernandezb@gmail.com";
    if (!is_object($mail)) {
        require_once('data/class.phpmailer.php');
        $mail = new PHPMailer;
    }
    $mensaje.="<br/>Atentamente.<br/>" . $nombre . "<br/>Correo: " . $email;
    
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "mail.axioma.cl"; // SMTP a utilizar. Por ej. smtp.elserver.com
    $mail->Username = "sisaxioma@axioma.cl"; // Correo completo a utilizar
    $mail->Password = "%.2019Xx23"; // Contraseña
    $mail->Port = 587; // Puerto a utilizar
    $mail->From = "sisaxioma@axioma.cl"; // Desde donde enviamos (Para mostrar)
    $mail->FromName = "Sistema Gestión Boletas Garantia";
    $mail->AddAddress($correo); // Esta es la dirección a donde enviamos
//$mail->AddCC("mgaete@ifetag.cl;"); // Copia	
//$mail->AddBCC("mgaete@ifetag.cl"); // Copia oculta
    $mail->IsHTML(true); // El correo se envía como HTML
    $mail->Subject = "Consulta Servicios"; // Este es el titulo del email.

    $body = $mensaje;
    $mail->CharSet = 'UTF-8';
    $mail->Body = $body; // Mensaje a enviar
    $mail->AltBody = "";
    $mail->ContentType = "text/html";
//$mail->AddAttachment("imagenes/1.jpg", "1.jpg");
    $mail->Send(); // Envía el correo.
    echo 1;
}

