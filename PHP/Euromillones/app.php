<?php
/**
 * API para conexion de moviles (Se hara de formula modular);
 * 1.- Metermos en la variable data el JSON recibido
 * 2.- Añadiremos un require para cada nueva funcion
 */
$data = file_get_contents("php://input"); //Añadimos el JSON a la variable data
$objData = json_decode($data); //Decodificamos el JSON
$tarea = $objData->tarea; //Metemos la tarea a realizar
$datos = $objData->datos; //Datos

/**
 * Requires de Conexion
 */
require("modulos/conectorDB.php");      //Conexion con la Base de Datos
require('modulos/mailing/class.phpmailer.php');//Para enviar mail por SMTP
require('modulos/mailing/class.smtp.php');//Para enviar mail por SMTP
/**
 * Requires de Modulos
 */
require("modulos/pruebaconexion.php");  //Para probar la conexion
require("modulos/loginInServer.php");	//Para hacer login en el servidor
require("modulos/registro.php");        //Para registrar usuarios
require("modulos/ultimosSorteos.php");   //Para mostrar los ultimos sorteos
require("modulos/numero_Mes.php");   //Para mostrar los numeros mas repetidos del mes
require("modulos/numero_Completo.php");   //Para mostrar los numeros mas repetidos desde el principio
require("modulos/numero_SemiAleatorio.php");   //Para mostrar los numeros mas repetidos desde el principio con semialeatorio
require("modulos/activarUser.php");   //Para activar usuario
require("modulos/desactivarUser.php");   //Para eliminar usuario
require("modulos/cargarUser.php");   //Para cargar usuario
require("modulos/eliminarUser.php");   //Para eliminar usuario
require("modulos/modificarUser.php");   //Para eliminar usuario
require("modulos/getUsers.php");   //Para traer todos los Usuarios
require("modulos/guardarResultado.php");   //Para traer todos los Usuarios
require("modulos/changePass.php");   //Para cambiar la contraseña


/**
 * CASE de las tareas permitidas
 */
switch ($tarea) {
    case "Prueba Servidor":
    $fp = fopen('TestPrueba.txt', 'w');
	fwrite($fp, $datos);
	fclose($fp);
    $prueba = prueba($data);
        $fp = fopen('TestPruebaFunction.txt', 'w');
	fwrite($fp, $prueba);
	fclose($fp);
	echo prueba($data);
        break;
    case "Login":
        echo login($datos);
        break;
    case "Ultimos Sorteos":
        echo ultimosSorteos($datos);
        break;
        case "Numeros del Mes":
        echo numeroMes();
        break;
        case "Numeros Completo":
        echo numeroCompleto();
        break;
        case "Numeros Semi":
        echo numeroSemi();
        break;
        case "Registro":
        echo registro($datos);
        break;
        case "Activar Usuario":
        echo activarUsers($datos);
        break;
        case "Desactivar Usuario":
        echo desactivarUser($datos);
        break;
        case "Cargar Usuario":
        echo cargarUser($datos);
        break;
        case "Eliminar Usuario":
        echo eliminarUser($datos);
        break;
        case "Modificar Datos":
        echo modificarUser($datos);
        break;
        case "Modificar Nivel":
        echo modificarUserLevel($datos);
        break;
        case "Traer Usuarios":
        echo traerUsuarios();
        break;
        case "Guardar Resultado":
        echo guardarResultado($datos);
        break;
        case "Actualizar Pass":
        echo actualizarPass($datos);
        break;

}


?>
