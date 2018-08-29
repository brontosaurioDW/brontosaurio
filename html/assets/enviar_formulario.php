<?php
	$emailPara	= 'hola@brontosaurio.com.ar'; 
	$subject	= 'Contacto brontosario.com.ar';

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
	}

	/*if($_POST) {
	    $to_email       = "hola@brontosario.com.ar"; //Recipient email, Replace with own email here
	    $emailPara     = "hola@brontosario.com.ar"; //from mail, it is mandatory with some hosts and without it mail might endup in spam.
	    
	    //check if its an ajax request, exit if not
	    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	        
	        $output = json_encode(array( //create JSON data
	            'type'=>'error', 
	            'text' => 'Sorry Request must be Ajax POST'
	        ));
	        die($output); //exit script outputting json data
	    } 
	    
	    //Sanitize input data using PHP filter_var().
	    $nombreapellido = filter_var($_POST["nombreapellido"], FILTER_SANITIZE_STRING);
	    $email     		= filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	    $message        = filter_var($_POST["mensaje"], FILTER_SANITIZE_STRING);
	    $subject        = 'Contacto de brontosario.com.ar de ' . $nombreapellido;
	    
	    //additional php validation
	    if(strlen($nombreapellido) < 3){ // If length is less than 4 it will output JSON error.
	        $output = json_encode(array('type'=>'error', 'text' => 'Por favor completa un nombre válido'));
	        die($output);
	    }

	    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //email validation
	        $output = json_encode(array('type'=>'error', 'text' => 'Por favor ingresa un email válido'));
	        die($output);
	    }

	    if(strlen($message) < 3){ //check emtpy message
	        $output = json_encode(array('type'=>'error', 'text' => 'El mensaje es muy corto :('));
	        die($output);
	    }
	    
	    //email body
	    $message_body = $message."\r\n\r\n-".$nombreapellido."\r\nEmail : ".$email;
	    
	    //proceed with PHP email.
	    $headers = 'From: '. $emailPara .'' . "\r\n" .
	    'Reply-To: '.$email.'' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();
	    
	    $send_mail = mail($to_email, $subject, $message_body, $headers);
	    
	    if(!$send_mail) {
	        //If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
	        $output = json_encode(array('type'=>'error', 'text' => 'No se pudo enviar el mensaje'));
	        die($output);
	    } else {
	        $output = json_encode(array('type'=>'message', 'text' => 'Gracias ' . $nombreapellido .'. ¡Te responderemos a la brevedad!'));
	        die($output);
	    }
	}*/
?>