<?php
	/*$emailPara	= 'hola@brontosaurio.com.ar'; 
	$subject	= 'Contacto brontosaurio.com.ar';

	$enviado	="../index.html";
	$mensaje 	= '';
	$primero 	= true;

	foreach($_POST as $indice => $valor){
		if (is_array($valor)) {
			$mensaje .= '<strong>'.$indice.': </strong><ul>';
				foreach($valor as $item) {
					$mensaje .= '<li>'.$item .'</li>';
				}
			$mensaje .= '</ul><br>';
		} else {
			if($primero) {
				$from = $valor;
				$primero = false;
			}

			$mensaje .= '<strong>'.$indice.': </strong>';
			$mensaje .= $valor . '<br>';
			
			if(strpos($valor, '@')>3 && strpos($valor, '.') > -1){
				$from = $valor;
			}
		}
	}

	$mail_headers  = "MIME-Version: 1.0\r\n";
	$mail_headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$mail_headers .= 'Email de: ' . $from . "\r\n";
	
	$send_mail = mail($emailPara, $subject, $mensaje, $mail_headers);
	
	if(!$send_mail) {
	    $output = json_encode(array('type'=>'error', 'text' => 'No se pudo enviar el mensaje'));
	    die($output);
	} else {
	    $output = json_encode(array('type'=>'message', 'text' => 'Gracias por tu mensaje ¡Te responderemos a la brevedad!'));
	    die($output);
	}*/

	// Proccess at only POST metheod
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    // name of sender
	    $name = $_POST["nombre"];
	     
	    // Email of sender
	    $email = $_POST["email"];
	     
	    // Sender subject
	    $subject = $_POST["mensaje"];
	     
	    // Your email where this email will be sent
	    $your_email = "hola@brontosaurio.com.ar";
	    //Your site name for identify 
	    $your_site_name = "Brontosaurio.com.ar: ";
	     
	    // Build email subject
	    $email_subject = "[{$your_site_name}] Nuevo mensaje de: {$name}";
	     
	    // Build Email Content
	    $email_content = "Nombre: {$name}\n";
	    $email_content .= "Email: {$email}\n";
	    $email_content .= "Comentario: {$subject}\n";
	     
	    // Build email headers
	    $email_headers = "De: {$name} <{$email}>";
	     
	    // Send email
	    $send_email = mail($your_email, $email_subject, $email_content, $email_headers);
	     
	    // Check email sent or not
	    if($send_email){
	        // Send a 200 response code.
	        http_response_code(200);
	        echo "Gracias " . $name . '! Tu mensaje ha sido enviado. Te responderemos a la brevedad.'; 
	        echo $send_email;
	    } else {
	        // Send a 500 response code.
	        http_response_code(500);
	        echo "Uy! No pudimos enviar tu mensaje. Por favor intenta en un ratito.";
	    }
	} else {
	    // Send 403 response code
	    http_response_code(403);
	    echo "Uy! No pudimos enviar tu mensaje. Por favor intenta en un ratito. :(";
	}

?>