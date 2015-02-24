<?php
/**
 * Modulo para Traer Usuarios
 * V.1.0.0
 */
function traerUsuarios(){
/**
 * Variables
 */
$tabla = "";
$arrayUSERS = array ();
$contador = 0;

/**
 * Funciones Necesarias
 * Con un for indicamos que niveles de seguridad queremos buscar, del 1 al 3 (ambos incluidos)
 * por eso hasta el 4
 */
for ($i=1; $i <4 ; $i++) { 
	//Indicamos que nivel queremos buscar
	$nivel = $i;
			//Array return
			$arrayReturn = array();
			//Consulta
		$consulta = "SELECT nombre, apellidos, nivel, mail, tel, activo FROM  `".$tabla."` WHERE  `nivel`='".$nivel."' ORDER BY `nombre` ASC";
		$respuesta = getArraySQL($consulta); //Para Enviar consulta
		// Para comprobar si el resultado es vacío:
		if (mysqli_num_rows($respuesta) == 0) { //Nos devuelve la cantidad de Filas que tiene
    			 //NADA
		} else{
			
			// Si el resultado de la consulta pueden ser varias filas:
			while ($valor = mysqli_fetch_array($respuesta, MYSQLI_ASSOC)) {
				//Variables
				$arrayTEMP = array ();
				$arrayTEMP['Nombre'] = $valor['nombre'];
				if ($valor['nivel']=='1') {
					$arrayTEMP['Nivel'] = 'Usuario';
				} else if ($valor['nivel']=='2') {
					$arrayTEMP['Nivel'] = 'Colaborador';
				} else if ($valor['nivel']=='3') {
					$arrayTEMP['Nivel'] = 'Administrador';
				}
				$arrayTEMP['Apellidos'] = $valor['apellidos'];
				$arrayTEMP['Tel'] = $valor['tel'];
				$arrayTEMP['Mail'] = $valor['mail'];
				$arrayTEMP['Activo'] = $valor['activo'];
				
				/*
                        if ($valor['activo'] == "si") {
                        	 $htmlTemp = $htmlTemp.'<div class="order-wrapper"><a href="" class="btn btn-normal-desactivar btn-order">Desactivar</a></div>';
                        } else {
                        	 $htmlTemp = $htmlTemp.'<div class="order-wrapper"><a href="" class="btn btn-normal btn-order">Activar</a></div>';	
                        };*/
                       
                $nombreTEMP= "User_".$contador; // no muestra .length
				$arrayUSERS[$nombreTEMP] = $arrayTEMP; // no muestra .length
				$contador++;
				//echo $nombreTEMP;
				//echo json_encode($arrayTEMP);
			};
			//NADA
		};
}

echo json_encode($arrayUSERS);
};
?>
