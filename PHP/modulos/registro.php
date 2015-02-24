<?php	
/**
 * Modulo para hacer un registro
 * Procedimiento a Seguir:
 * Comprobar si existe dicho usuario, si existe terminar aqui
 * si no existe registrar uno nuevo y mandar un mail al usuario registrado
 * V.1.0.0
 */
function registro($datos){
$tabla = "";
	//Decodificamos el JSON
	$objData = json_decode($datos);
	$mailRegistro = $objData->mail;
	$nombreRegistro = $objData->nombre;
	$passRegistro = $objData->pass;
	//Comprobamos si existe el usuario
	$consulta = "SELECT id FROM  `".$tabla."` WHERE  `mail`='".$mailRegistro."'";
	$respuesta = getArraySQL($consulta); //Para Enviar consulta
	//Comprobamos si tiene datos (Si tienes es que ya existe entonces por lo tanto no se puede registrar)
	if (mysqli_num_rows($respuesta) != 0) { //Nos devuelve la cantidad de Filas que tiene
    			 $respuestaJSON = array("Respuesta" => "Error #001 - El mail ya existe!");
    			return json_encode($respuestaJSON);
	} else {
		//Hacemos el registro
	$consulta = "INSERT INTO  `".$tabla."` (`id` ,`mail` ,`pass` ,`nombre` ,`apellidos` ,`tel` ,`nivel` ,`activo` ,`debaja`)VALUES (NULL ,  '".$mailRegistro."',  '".$passRegistro."',  '".$nombreRegistro."',  '',  '',  '1',  'no', 'no')";
	$respuesta = getArraySQL($consulta); //Para Enviar consulta
	//Enviar Mail
	//##########################################################
	
	$mail = new PHPMailer();

	$body = 'Hola '.$nombreRegistro.', <br>Te has registrado correctamente en "Euromillones" de AteneaSystems.<br>De momento es una versión "beta" privada y tendrás que esperar a que te activen la cuenta. Recibiras un correo cuanto la cuenta este activa. <br>Gracias.';

	$mail->IsSMTP(); 

	// la dirección del servidor, p. ej.: smtp.servidor.com
	$mail->Host = 'mail.ateneasystems.es';

	// dirección remitente, p. ej.: no-responder@miempresa.com
	$mail->From = 'info@ateneasystems.es';

	// nombre remitente, p. ej.: "Servicio de envío automático"
	$mail->FromName = 'Servidor AteneaSystems';

	// asunto y cuerpo alternativo del mensaje
	$mail->Subject = 'Alta de Usuario - Euromillones';
	$mail->AltBody = 'Hola '.$nombreRegistro.'. Te has registrado correctamente en "Euromillones" de AteneaSystems. De momento es una versión "beta" privada y tendrás que esperar a que te activen la cuenta. Recibiras un correo cuanto la cuenta este activa. Gracias.'; 

	// si el cuerpo del mensaje es HTML
	$mail->MsgHTML($body);

	// podemos hacer varios AddAdress
	$mail->AddAddress($mailRegistro);

	// si el SMTP necesita autenticación
	$mail->SMTPAuth = true;

	// credenciales usuario
	$mail->Username = 'info@ateneasystems.es';
	$mail->Password = ''; 

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
