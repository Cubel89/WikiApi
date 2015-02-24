<?php
/**
 * Modulo los numeros mas repetidos del todo y semialeatorios
 * V.0.0.6
 */
function numeroSemi(){
/**
 * Arrays de datos
 * Estos datos se deberian coger de la base de datos pero como esta de prueba
 * insertare aqui los numeros de los ultimos cuatro sorteos
 * NOTA: Aqui programar la funcion para traer numeros desde la Base de Datos
 * $numerosPremiados = array(2,3,17,36,38,17,32,36,38,48,2,14,21,36,46,13,25,32,38,46);
 * $estrellasPremiadas = array(4,11,8,5,7,11,1,10);
 */
$numerosPremiados = array();
$estrellasPremiadas = array();

/**
 * Arrays Necesarios
 */
$numerosGanadores = array();//Para ordenar los numeros de mas premiados a menos
$estrellasGanadoras = array();//Para ordenar las estrellas de mas premiadas a menos

/**
 * Arrays Temporales
 * Estos son los array que contaran cuantos premios tiene cada numero por lo tanto 
 * los dejaremos a 0
 */
$tempNumeros = array();
$tempEstrellas = array();
/**
 * Arrays para Aleatorios
 */
$numeros5Ganadores = array();
$estrellas2Ganadores = array();
$numeros5GanadoresFinal = array();
$estrellas2GanadoresFinal = array();

/**
 * Variable Temporal
 */
$numeroMasRepetido = "";
/**
 * Consulta
 */
$consulta = "SELECT * FROM `euromillon_sorteos` ORDER BY `fecha` DESC limit 1000";
		$respuesta = getArraySQL($consulta); //Para Enviar consulta
		$arrayJSON = array ();
		// Para comprobar si el resultado es vacío:
		if (mysqli_num_rows($respuesta) == 0) { //Nos devuelve la cantidad de Filas que tiene
    			 echo "Error en Consulta";
		} else{
			// Si el resultado de la consulta pueden ser varias filas:
			while ($valor = mysqli_fetch_array($respuesta, MYSQLI_ASSOC)) {
				//Rellenamos el array de numeros
				array_push($numerosPremiados, $valor['n1']);
				array_push($numerosPremiados, $valor['n2']);
				array_push($numerosPremiados, $valor['n3']);
				array_push($numerosPremiados, $valor['n4']);
				array_push($numerosPremiados, $valor['n5']);
				//Rellenamos el array de estrellas
				array_push($estrellasPremiadas, $valor['e1']);
				array_push($estrellasPremiadas, $valor['e2']);
				//cremamos la cadena JSON
				
			};
		};

//Aqui rellenamos la cantidad de 0 a cada numero posible en el sorteo
//Como en el sorteo de numeros son del 1 al 50
for ($x=0; $x <50 ; $x++) { //Esto se repite 50 veces
	array_push($tempNumeros, 0);//A cada numero le ponemos un 0
}
//Como en el sorteo de estrellas son del 1 al 11
for ($y=0; $y <11 ; $y++) { //Esto se repite 11 veces
	array_push($tempEstrellas, 0);//A cada numero le ponemos un 0
}

/**
 * Calculo de los numeros mas premiados
 */
foreach ($numerosPremiados as $key => $value) {
	/* Value muestra el numero premiado, como el array empieza a contar de 0
	tenemos que restarle 1 para indicarle correctamente la posicion.*/
	$posAGuardar = $value-1;
	/* Ahora que ya sabemos en que posicion lo tiene que guardar, le diremos
	que nos saque el numero que hay guardado y le sume uno.*/
	$nuevoValor = $tempNumeros[$posAGuardar] + 1;
	/* Por ultimo, como ya tenemos el nuevo valor, lo volvemos a guardar
	en la posicion que toca.*/
	$tempNumeros[$posAGuardar]=$nuevoValor;	
}
arsort($tempNumeros); //Con esto ordenamos los datos de mayor cantidad a menor cantidad
/* Esta funcion sirve para mostrar cuantas veces ha sido premiado un numero */
foreach ($tempNumeros as $key => $val) {
	/* Como el array empieza por 0 y el sorteo empieza por 1, siempre sumaremos
	un numero mas a la posicion, en este caso la posicion es la clave $key. */ 
	$numero = $key+1; //Sumamos uno como hemos dicho anteriormente
	/* Con esto imprimimos en pantalla. Esto solo sirve para comprobar que funciona
	una vez comprobado, esto se tiene que eliminar. */
     array_push($numerosGanadores, $numero);  
}
for ($i=0; $i <15 ; $i++) {
	//Añadimos los 15 numeros ganadores al array de solo 15 numeros
 	array_push($numeros5Ganadores, $numerosGanadores[$i]);
}

/**
 * Calculo de las Estrellas mas premiadas
 */
foreach ($estrellasPremiadas as $key => $value) {
	/* Value muestra la estrella premiada, como el array empieza a contar de 0
	tenemos que restarle 1 para indicarle correctamente la posicion.*/
	$posAGuardar = $value-1;
	/* Ahora que ya sabemos en que posicion lo tiene que guardar, le diremos
	que nos saque el numero que hay guardado y le sume uno.*/
	$nuevoValor = $tempEstrellas[$posAGuardar] + 1;
	/* Por ultimo, como ya tenemos el nuevo valor, lo volvemos a guardar
	en la posicion que toca.*/
	$tempEstrellas[$posAGuardar]=$nuevoValor;	
}
arsort($tempEstrellas); //Con esto ordenamos los datos de mayor cantidad a menor cantidad
/* Esta funcion sirve para mostrar cuantas veces ha sido premiado un numero */
foreach ($tempEstrellas as $key => $val) {
	/* Como el array empieza por 0 y el sorteo empieza por 1, siempre sumaremos
	un numero mas a la posicion, en este caso la posicion es la clave $key. */ 
	$estrella = $key+1; //Sumamos uno como hemos dicho anteriormente
	/* Con esto imprimimos en pantalla. Esto solo sirve para comprobar que funciona
	una vez comprobado, esto se tiene que eliminar. */
    array_push($estrellasGanadoras, $estrella);
}
for ($i=0; $i <5 ; $i++) { 
	//Añadimos las 5 estrellas ganadoras al array de solo 5 estrellas
	array_push($estrellas2Ganadores, $estrellasGanadoras[$i]);
}
/**
 * Creamos el numero final semialeatorio
 */
//Hacemos numero semi aleatorio
for ($i=0; $i < 5;) { 
	//calculamos un numero aleatorio
	$seguir=true;
	if (($i == 0)||($i == 1)||($i == 2)) {
				$nAletorio = rand(0,14);
				for ($a=0; $a < count($numeros5GanadoresFinal) ; $a++) { 
					if ($numeros5Ganadores[$nAletorio] == $numeros5GanadoresFinal[$a]) {
						$seguir = false;
						break;
					}
					$seguir = true;
				}
				if ($seguir) {
					array_push($numeros5GanadoresFinal, $numeros5Ganadores[$nAletorio]);
					$i++;
				}				
	} else if (($i == 3)||($i == 4)){
		$nAletorio = rand(1,50);
		for ($a=0; $a < count($numeros5GanadoresFinal) ; $a++) { 
					if ($nAletorio == $numeros5GanadoresFinal[$a]) {
						$seguir = false;
						break;
					}
					$seguir = true;
				}
				if ($seguir) {
					array_push($numeros5GanadoresFinal, $nAletorio);
					$i++;
				}	
	}

	
}
//Hacemos estrellas semi aleatorio
for ($i=0; $i < 2;) { 
	$seguir=true;
	if ($i == 0) {
				$nAletorio = rand(0,1);
				for ($a=0; $a < count($estrellas2GanadoresFinal) ; $a++) { 
					if ($estrellas2Ganadores[$nAletorio] == $estrellas2GanadoresFinal[$a]) {
						$seguir = false;
						break;
					}
					$seguir = true;
				}
				if ($seguir) {
					array_push($estrellas2GanadoresFinal, $estrellas2Ganadores[$nAletorio]);
					$i++;
				}				
	} else if ($i == 1){
		$nAletorio = rand(1,11);
		for ($a=0; $a < count($estrellas2GanadoresFinal) ; $a++) { 
					if ($nAletorio == $estrellas2GanadoresFinal[$a]) {
						$seguir = false;
						break;
					}
					$seguir = true;
				}
				if ($seguir) {
					array_push($estrellas2GanadoresFinal, $nAletorio);
					$i++;
				}	
	}

	
}
//Vaciamos la cadena a enviar y empezamos de nuevo su creacion
$numeroMasRepetido = "";
for ($np=0; $np < count($numeros5GanadoresFinal) ; $np++) { 
	$numeroMasRepetido = $numeroMasRepetido.$numeros5GanadoresFinal[$np];
	if ($np!=count($numeros5GanadoresFinal)-1) {
		$numeroMasRepetido = $numeroMasRepetido." - ";
	}
}
$numeroMasRepetido = $numeroMasRepetido." [";
for ($ep=0; $ep < count($estrellas2GanadoresFinal) ; $ep++) { 
	$numeroMasRepetido = $numeroMasRepetido.$estrellas2GanadoresFinal[$ep];
	if ($ep!=count($estrellas2GanadoresFinal)-1) {
		$numeroMasRepetido = $numeroMasRepetido." - ";
	}
}
$numeroMasRepetido = $numeroMasRepetido."]";
/**
 * Array JSON, Esto es para generar una cadena JSON compatible con AngularJS y Android
 */
//$respuestaJSON = array();
$tempJSON = array();
$tempJSON['respuesta'] = "Ok";
$tempJSON['numero'] = $numeroMasRepetido;
//array_push($respuestaJSON, $tempJSON);
return json_encode($tempJSON);
}
?>
