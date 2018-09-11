<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    use PHPMailer\PHPMailer\PHPMailer;

    use PHPMailer\PHPMailer\Exception;

    require('libs/src/PHPMailer.php');

    require('libs/src/Exception.php');

    require('libs/src/SMTP.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	 
        // #Reemplazar este correo por el correo electrónico del destinatario
        // $mail_to = 'hola@brontosaurio.com.ar'; 
        // $subject = 'Contacto desde Bronto web.';
        
        // # Envío de datos
        // $name = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["nombre"])));
        // $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        // $message = trim($_POST["mensaje"]);

        // /*if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($message)) {
        //     # Establecer un código de respuesta y salida.
        //     http_response_code(400);
        //     echo "Por favor completa los datos :)";
        //     exit;
        // }*/

        // $mail = new PHPMailer();

        // $preMensaje = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
         
        // <html xmlns="http://www.w3.org/1999/xhtml">
         
        //  <head>
         
        // <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
         
        // <title>Demystifying Email Design</title>
         
        // <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
         
        // </head><body>';
        // $postMensaje = '</body></html>';

        // # Contenido del correo
        // $mensaje = "<div>Nombre: $name</div>";
        // $mensaje .= "<div>E-mail: $email</div>";
        // $mensaje .= "<div>Mensaje:\n$message</div>";

        // $mensaje = $preMensaje . $mensaje . $postMensaje;

        // $mail->SMTPDebug = 2;

        // $mail->isSMTP();                                             

        // $mail->Host = 'smtp.gmail.com';     

        // $mail->Port = 587;

        // $mail->SMTPSecure = 'tls'; 

        // $mail->SMTPAuth = true;                                      

        // $mail->Username = 'hola@brontosaurio.com.ar';           

        // $mail->Password = 'somos_bronto_1357';                         

        // $mail->setFrom($mail_to, 'Brontosaurio');

        // $mail->addAddress($email, $name);

        // $mail->isHTML(true);

        // $mail->Subject = $subject;

        // $mail->Body = html_entity_decode($mensaje);

        // if(!$mail->Send())
        // {

        //    //echo 'Uy! Algo salió mal, no pudimos enviar tu mensaje.';
        //    echo "Mailer Error: " . $mail->ErrorInfo;

        // }

        // else

        // {

        //    echo 'Gracias por tu mensaje ¡Te responderemos a la brevedad!';

        // }

        $mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 3; // debugging: 1 = errors and messages, 2 = messages only
        $mail->isSMTP();
        $mail->Host       = "relay-hosting.secureserver.net";
        $mail->Port       = 25;                   
        $mail->SMTPSecure = "none";                 
        $mail->SMTPAuth   = false;
        $mail->Username   = "";
        $mail->Password   = "";
        $mail->IsHTML(true);
        $mail->SetFrom("hola@brontosaurio.com.ar");
        $mail->Subject = "Test";
        $mail->Body = "hello";
        $mail->AddAddress("merloleandro@gmail.com");

         if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
         } else {
            echo "Message has been sent";
         }

    } else {
        # No es una solicitud POST, establezce un código de respuesta 403 (prohibido).
        //http_response_code(403);
    	echo 'Hubo un problema con tu envío, intenta de nuevo.';
    }
?>