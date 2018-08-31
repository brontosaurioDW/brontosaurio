<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	 
        #Reemplazar este correo por el correo electrónico del destinatario
        $mail_to = 'hola@brontosaurio.com.ar'; 
        $subject = 'Contacto desde Bronto web.';
        
        # Envío de datos
        $name = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["nombre"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["mensaje"]);

        /*if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($message)) {
            # Establecer un código de respuesta y salida.
            http_response_code(400);
            echo "Por favor completa los datos :)";
            exit;
        }*/
        
        # Contenido del correo
        $content = "Nombre: $name\n";
        $content .= "E-mail: $email\n\n";
        $content .= "Mensaje:\n$message\n";
 
        # Encabezados de correo electrónico.
        $headers = "From: $name <$email>";
 
        # Envía el correo.
        $success = mail($mail_to, $subject, $content, $headers);
        if ($success) {
            # Establece un código de respuesta 200 (correcto).
            //http_response_code(200);
            echo 'Gracias por tu mensaje ¡Te responderemos a la brevedad!';
        } else {
            # Establezce un código de respuesta 500 (error interno del servidor).
            //http_response_code(500);
            echo 'Uy! Algo salió mal, no pudimos enviar tu mensaje.';
        }
    } else {
        # No es una solicitud POST, establezce un código de respuesta 403 (prohibido).
        //http_response_code(403);
    	echo 'Hubo un problema con tu envío, intenta de nuevo.';
    }
?>