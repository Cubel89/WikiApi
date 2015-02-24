<?php
/**
 * Modulo para hacer login
 * Procedimiento a Seguir:
 * Se consulta al servidor el ID del usuario, Nombre, y Pass con solo darle el USER
 * y android comprobara si es correcto despues de decodificar el PASS
 */
function cargarUser($datos){
//Creamos la consulta 
$consulta = "SELECT nombre, apellidos, mail, tel, nivel FROM  `euromillon_login` WHERE  `mail`='".$datos."'";
$respuesta = getArraySQL($consulta); //Para Enviar consulta
		// Para comprobar si el resultado es vacío:
		if (mysqli_num_rows($respuesta) == 0) { //Nos devuelve la cantidad de Filas que tiene
			$respuestaJSON = array("Respuesta" => "Error en la Carga de Datos");
			//$respuestaJSON = ["Respuesta" => "Error en Login"];
    			return json_encode($respuestaJSON);
		} else{
			$respuestaJSON = array("Respuesta" => "OK");
			// Si el resultado de la consulta pueden ser varias filas:
			while ($valor = mysqli_fetch_array($respuesta, MYSQLI_ASSOC)) {
				$respuestaJSON['apellidos'] = $valor[apellidos];
				$respuestaJSON['nombre'] = $valor[nombre];
				$respuestaJSON['tel'] = $valor[tel];
				$respuestaJSON['nivel'] = $valor[nivel];
				$respuestaJSON['mail'] = $valor[mail];
				return json_encode($respuestaJSON);
			};
		};
};
?>