<?php	
/**
 * Modulo para cambiar el Pass
 * V.1.0.0
 */
function actualizarPass($datos){
$tabla = "";
	//Decodificamos el JSON
	$objData = json_decode($datos);
	$mailRegistro = $objData->mail;
	$passRegistro = $objData->pass;
		//Hacemos el registro
	$consulta = "UPDATE `".$tabla."` SET `pass` = '".$passRegistro."' WHERE `mail` = '".$mailRegistro."'";
	$respuesta = getArraySQL($consulta); //Para Enviar consulta
	
	//Respondemos que todo esta OK
	$respuestaJSON = array("Respuesta" => "OK");
    return json_encode($respuestaJSON);
	
};
?>
