<?php
/**
 * Modulo para probar la conexion Movil-PHP
 * V.0.0.6
 */
function prueba($JSONRecibido){
$objData = json_decode($JSONRecibido);
$tarea = $objData->tarea;
$datos = $objData->datos;
/*$fp = fopen('prueba.txt', 'w');
fwrite($fp, $sql);
fclose($fp);*/
return json_encode($objData);
}
?>
