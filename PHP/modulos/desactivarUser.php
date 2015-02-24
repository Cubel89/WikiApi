<?php
/**
 * Modulo para desactivar User
 * V.1.0.0
 */
function desactivarUser($datos){
$tabla = "";
//Desactivar usuario
	$consulta = "UPDATE `".$tabla."` SET `activo` = 'no' WHERE `mail`='".$datos."'";
		$respuesta = getArraySQL($consulta); //Para Enviar consulta
		
	$respuestaJSON = array("Respuesta" => "OK");
    return json_encode($respuestaJSON);
};
?>
