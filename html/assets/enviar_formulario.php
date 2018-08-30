<?php
	$emailPara	= 'hola@brontosaurio.com.ar'; 
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

			$mensaje .= '</ul>';
		} else {
			if($primero) {
				$from = $valor;
				$primero = false;
			}

			$mensaje .= '<strong>' . $indice . ': </strong>';
			$mensaje .= $valor . '<br>';
			
			if(strpos($valor, '@') > 3 && strpos($valor, '.') > -1){
				$from = $valor;
			}
		}
	}

	$mail_headers  = "MIME-Version: 1.0\r\n";
	$mail_headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$mail_headers .= 'Email de: ' . $from . "\r\n";
	
	$send_mail 	= mail($emailPara, $subject, $mensaje, $mail_headers);
	
	if(!$send_mail) {
	    /*json_encode(array('type'=>'error', 'text' => 'No se pudo enviar el mensaje'));*/
	    echo "No se manda";
	} else {
	    /*json_encode(array('type'=>'message', 'text' => 'Gracias por tu mensaje ¡Te responderemos a la brevedad!'));*/
	    echo "Se manda";
	}
?