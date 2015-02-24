<?php
/**
 * Modulo para Activar User
 */
function activarUsers($datos){
//Activar usuario
		$consulta = "UPDATE `euromillon_login` SET `activo` = 'si' WHERE `mail`='".$datos."'";
		$respuesta = getArraySQL($consulta); //Para Enviar consulta
		$consulta = "SELECT nombre, mail FROM  `euromillon_login` WHERE  `mail`='".$datos."' AND `activo`='si'";
		$respuesta = getArraySQL($consulta); //Para Enviar consulta
		if (mysqli_num_rows($respuesta) == 0) { //Nos devuelve la cantidad de Filas que tiene
			$respuestaJSON = array("Respuesta" => "Error de Activacion");
			//$respuestaJSON = ["Respuesta" => "Error en Login"];
    			return json_encode($respuestaJSON);
		} else{
			$nombreUser = "";
			$mailUser = "";
			while ($valor = mysqli_fetch_array($respuesta, MYSQLI_ASSOC)) {
				$nombreUser = $valor['nombre'];
				$mailUser = $valor['mail'];
			};
			//Enviar Mail
	//##########################################################
	
	$mail = new PHPMailer();

	$body = 'Hola '.$nombreUser.', <br>Tu cuenta ha sido activada!<br> Podrás acceder con el Usuario: '.$mailUser.'. La contraseña nunca se mandará por correo por motivos de seguridad.<br>Gracias.';

	$mail->IsSMTP(); 

	// la dirección del servidor, p. ej.: smtp.servidor.com
	$mail->Host = 'mail.ateneasystems.es';

	// dirección remitente, p. ej.: no-responder@miempresa.com
	$mail->From = 'info@ateneasystems.es';

	// nombre remitente, p. ej.: "Servicio de envío automático"
	$mail->FromName = 'Servidor AteneaSystems';

	// asunto y cuerpo alternativo del mensaje
	$mail->Subject = 'Cuenta Activada - Euromillones';
	$mail->AltBody = 'Hola '.$nombreUser.'. Tu cuenta ha sido activada! Podrás acceder con el Usuario: '.$mailUser.'. La contraseña nunca se mandará por correo por motivos de seguridad. Gracias.';

	// si el cuerpo del mensaje es HTML
	$mail->MsgHTML($body);

	// podemos hacer varios AddAdress
	$mail->AddAddress($mailUser);

	// si el SMTP necesita autenticación
	$mail->SMTPAuth = true;

	// credenciales usuario
	$mail->Username = 'info@ateneasystems.es';
	$mail->Password = 'atenea2015'; 

	if(!$mail->Send()) {
	return 'Error enviando: ' . $mail->ErrorInfo;
	} else {
	//return '¡¡Enviado!!';
	};
	//##########################################################
	//Respondemos que todo esta OK
	$respuestaJSON = array("Respuesta" => "OK");
    return json_encode($respuestaJSON);
			};
};
?>
