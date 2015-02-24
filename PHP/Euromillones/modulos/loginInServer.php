<?php
/**
 * Modulo para hacer login
 * Procedimiento a Seguir:
 * Se consulta al servidor el ID del usuario, Nombre, y Pass con solo darle el USER
 * y android comprobara si es correcto despues de decodificar el PASS
 */
function login($datos){
//Creamos la consulta 
$consulta = "SELECT id, nombre, pass, nivel, mail FROM  `euromillon_login` WHERE  `mail`='".$datos."' AND `activo`='si' AND `debaja`='no'";
$respuesta = getArraySQL($consulta); //Para Enviar consulta
		// Para comprobar si el resultado es vacío:
		if (mysqli_num_rows($respuesta) == 0) { //Nos devuelve la cantidad de Filas que tiene
			$respuestaJSON = array("Respuesta" => "Error en Login");
			//$respuestaJSON = ["Respuesta" => "Error en Login"];
    			return json_encode($respuestaJSON);
		} else{
			$respuestaJSON = array("Respuesta" => "OK");
			// Si el resultado de la consulta pueden ser varias filas:
			while ($valor = mysqli_fetch_array($respuesta, MYSQLI_ASSOC)) {
				$respuestaJSON['id'] = $valor[id];
				$respuestaJSON['nombre'] = $valor[nombre];
				$respuestaJSON['pass'] = $valor[pass];
				$respuestaJSON['nivel'] = $valor[nivel];
				$respuestaJSON['mail'] = $valor[mail];
				return json_encode($respuestaJSON);
			};
		};
};
?>
