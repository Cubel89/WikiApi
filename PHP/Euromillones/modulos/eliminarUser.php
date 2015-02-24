<?php
/**
 * Modulo para Eliminar User
 * V.0.0.6
 */
function eliminarUser($datos){
//Desactivar usuario
		$consulta = "UPDATE `euromillon_login` SET `debaja` = 'si', `activo` = 'no', `pass` = '' WHERE `mail`='".$datos."'";
		$respuesta = getArraySQL($consulta); //Para Enviar consulta
		
	$respuestaJSON = array("Respuesta" => "OK");
    return json_encode($respuestaJSON);
};
?>
