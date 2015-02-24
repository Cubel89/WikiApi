<?php	
/**
 * Modulo para cambiar el Pass
 * V.0.0.6
 */
function actualizarPass($datos){
	//Decodificamos el JSON
	$objData = json_decode($datos);
	$mailRegistro = $objData->mail;
	$passRegistro = $objData->pass;
		//Hacemos el registro
	$consulta = "UPDATE `euromillon_login` SET `pass` = '".$passRegistro."' WHERE `mail` = '".$mailRegistro."'";
	$respuesta = getArraySQL($consulta); //Para Enviar consulta
	
	//Respondemos que todo esta OK
	$respuestaJSON = array("Respuesta" => "OK");
    return json_encode($respuestaJSON);
	
};
?>
