<?php
/**
 * Modulo para desactivar User
 * V.0.0.6
 */
function desactivarUser($datos){
//Desactivar usuario
	$consulta = "UPDATE `euromillon_login` SET `activo` = 'no' WHERE `mail`='".$datos."'";
		$respuesta = getArraySQL($consulta); //Para Enviar consulta
		
	$respuestaJSON = array("Respuesta" => "OK");
    return json_encode($respuestaJSON);
};
?>
