<?php
/**
 * Modulo para Modificar User
 * V.0.0.6
 */
function modificarUser($datos){
	//Decodificamos el JSON
	$objData = json_decode($datos);
	$mailRegistro = $objData->mail;
	$nombreRegistro = $objData->nombre;
	$apellidosRegistro = $objData->apellidos;
	$telRegistro = $objData->tel;
//Modificar usuario
	$consulta = "UPDATE `euromillon_login` SET `nombre` = '".$nombreRegistro."', `apellidos` = '".$apellidosRegistro."', `tel` = '".$telRegistro."' WHERE `mail` = '".$mailRegistro."'";
	$respuesta = getArraySQL($consulta); //Para Enviar consulta
	$respuestaJSON = array("Respuesta" => "OK");
    return json_encode($respuestaJSON);
};
/**
 * Modulo para Modificar nivel User
 */
function modificarUserLevel($datos){
//Decodificamos el JSON
	$objData = json_decode($datos);
	$mailRegistro = $objData->mail;
	$nivelRegistro = $objData->nivel;
//Modificar Nivel
	$consulta = "UPDATE `euromillon_login` SET `nivel` = '".$nivelRegistro."' WHERE `mail` = '".$mailRegistro."'";
		$respuesta = getArraySQL($consulta); //Para Enviar consulta
		
	$respuestaJSON = array("Respuesta" => "OK");
    return json_encode($respuestaJSON);
};
?>
