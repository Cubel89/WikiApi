<?php
/**
 * V.1.0.0
 */
function connectDB(){
        //$conex = "local";
        $conex = "online";
        if ($conex == "local") {
            $server = "localhost";
            $user = "root";
            $pass = "";
            $bd = "prueba";
        } else if ($conex == "online"){
            $server = "localhost";
            $user = "root";
            $pass = "";
            $bd = "prueba";
		};        
    $conexion = mysqli_connect($server, $user, $pass,$bd);
        if($conexion){
            //echo 'La conexion de la base de datos se ha hecho satisfactoriamente<br>';
        }else{
            echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>';
        }
    return $conexion;
}
function disconnectDB($conexion){
    $close = mysqli_close($conexion);
        if($close){
            //echo 'La desconexion de la base de datos se ha hecho satisfactoriamente<br>';
        }else{
            echo 'Ha sucedido un error inexperado en la desconexion de la base de datos<br>';
        }   
    return $close;
}
function getArraySQL($sql){
    //Creamos la conexión con la función anterior
    $conexion = connectDB();
    //generamos la consulta
        mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
    if(!$result = mysqli_query($conexion, $sql)) die(); //si la conexión cancelar programa
    //$rawdata = array(); //creamos un array
    //guardamos en un array multidimensional todos los datos de la consulta
    //$i=0;

    //while($row = mysqli_fetch_array($result))
    //{
        //$rawdata[$i] = $row;
        //$i++;
    //}
    disconnectDB($conexion); //desconectamos la base de datos
    //return $rawdata; //devolvemos el array
    return $result; //devolvemos el array
}
?>