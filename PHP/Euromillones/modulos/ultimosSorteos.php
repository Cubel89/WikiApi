<?php
/**
 * Modulo para sacar los ultimos sorteos
 * V.0.0.6
 */
function ultimosSorteos($datos){
//Creamos la consulta 
$consulta = "SELECT * FROM `euromillon_sorteos` ORDER BY `fecha` DESC limit ".$datos."";
$respuesta = getArraySQL($consulta); //Para Enviar consulta
		// Para comprobar si el resultado es vacío:
		if (mysqli_num_rows($respuesta) == 0) { //Nos devuelve la cantidad de Filas que tiene
			$respuestaJSON = array("Respuesta" => "Error en Login");
			//$respuestaJSON = ["Respuesta" => "Error en Login"];
    			return json_encode($respuestaJSON);
		} else{
			//$respuestaJSON = array("Respuesta" => "OK");
			$respuestaJSON = array();
			$tempJSON = array();
			//$contador = 0;
			// Si el resultado de la consulta pueden ser varias filas:
			while ($valor = mysqli_fetch_array($respuesta, MYSQLI_ASSOC)) {
				$tempJSON['fecha'] = date("d-m-Y",strtotime($valor['fecha']));
				$tempJSON['numero'] = $valor['n1']." - ".$valor['n2']." - ".$valor['n3']." - ".$valor['n4']." - ".$valor['n5']." [".$valor['e1']." - ".$valor['e2']."]";
				//$contador = $contador+1;
				array_push($respuestaJSON, $tempJSON);
				//$respuestaJSON["R".$contador] = json_encode($tempJSON);
			};
			return json_encode($respuestaJSON);
		};
};
?>
