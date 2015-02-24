<?php
/**
 * Modulo para Eliminar User
 */
function eliminarUser($datos){
//Desactivar usuario
		$consulta = "UPDATE `euromillon_login` SET `debaja` = 'si', `activo` = 'no', `pass` = '' WHERE `mail`='".$datos."'";
		$respuesta = getArraySQL($consulta); //Para Enviar consulta
		
	$respuestaJSON = array("Respuesta" => "OK");
    return json_encode($respuestaJSON);
};
?>