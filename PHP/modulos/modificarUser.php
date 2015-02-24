<?php
/**
 * Modulo para Modificar User
 * V.1.0.0
 */
function modificarUser($datos){
$tabla = "";
	//Decodificamos el JSON
	$objData = json_decode($datos);
	$mailRegistro = $objData->mail;
	$nombreRegistro = $objData->nombre;
	$apellidosRegistro = $objData->apellidos;
	$telRegistro = $objData->tel;
//Modificar usuario
	$consulta = "UPDATE `".$tabla."` SET `nombre` = '".$nombreRegistro."', `apellidos` = '".$apellidosRegistro."', `tel` = '".$telRegistro."' WHERE `mail` = '".$mailRegistro."'";
	$respuesta = getArraySQL($consulta); //Para Enviar consulta
	$respuestaJSON = array("Respuesta" => "OK");
    return json_encode($respuestaJSON);
};
/**
 * Modulo para Modificar nivel User
 * V.1.0.0
 */
function modificarUserLevel($datos){
$tabla = "";
//Decodificamos el JSON
	$objData = json_decode($datos);
	$mailRegistro = $objData->mail;
	$nivelRegistro = $objData->nivel;
//Modificar Nivel
	$consulta = "UPDATE `".$tabla."` SET `nivel` = '".$nivelRegistro."' WHERE `mail` = '".$mailRegistro."'";
		$respuesta = getArraySQL($consulta); //Para Enviar consulta
		
	$respuestaJSON = array("Respuesta" => "OK");
    return json_encode($respuestaJSON);
};
?>
