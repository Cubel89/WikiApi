<?php
/**
 * Modulo para Eliminar User
 * V.1.0.0
 */
function eliminarUser($datos){
$tabla = "";
//Desactivar usuario
		$consulta = "UPDATE `".$tabla."` SET `debaja` = 'si', `activo` = 'no', `pass` = '' WHERE `mail`='".$datos."'";
		$respuesta = getArraySQL($consulta); //Para Enviar consulta
		
	$respuestaJSON = array("Respuesta" => "OK");
    return json_encode($respuestaJSON);
};
?>
