<?php
/**
 * Modulo para Guardar Resultado
 * V.1.0.0
 */
function guardarResultado($datos){
$tabla = "";
	//Decodificamos el JSON
	$objData = json_decode($datos);
	$fecha = $objData->fecha;
	$n1 = $objData->n1;
	$n2 = $objData->n2;
	$n3 = $objData->n3;
	$n4 = $objData->n4;
	$n5 = $objData->n5;
	$e1 = $objData->e1;
	$e2 = $objData->e2;
//Enviar Consulta
		$consulta = "INSERT INTO  `".$tabla."` (`id` ,`n1` ,`n2` ,`n3` ,`n4` ,`n5` ,`e1` ,`e2` ,`fecha`)VALUES (NULL ,  '".$n1."',  '".$n2."',  '".$n3."',  '".$n4."',  '".$n5."',  '".$e1."',  '".$e2."',  '".date("Y-m-d",strtotime($fecha))."')";
		$respuesta = getArraySQL($consulta); //Para Enviar consulta
	$respuestaJSON = array("Respuesta" => "OK");
    return json_encode($respuestaJSON);
};
