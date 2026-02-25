<?php
/**
 * PROCESAR LOGIN 
 * 
 * Desde el fomulario vendrán los datos para identificar 
 * al usuario
 * 
 */


require_once("config/configBaseDatos.php");
require_once("config/conexionBaseDatos.php");

//¿Hay que incluir esto para procesar lo que venga del login?
require_once("../controllers/loginController.php");


session_start();

//verificamos que el método de envío sea post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //si el formulario se ha enviado, lo procesamos
    if (isset($_POST['enviar'])) {

        //quitar espacios y añadir a las variables lo que viene del form
        $user = trim($_POST['user']);
        $password = $_POST['password'];
    }

    //La contraseña y/o user no puede estar vacio
    if (empty($user) || empty($password)) {
        echo "usuario y/o contraseña no pueden estar vacíos.";
    }

    //creamos el obj que manejará la base de datos
    $db = new ConexionBD();

    //se busca en la db si es admin y se almacena el id en el array $admin
    //header a la localizacion que corresponda

    
    //si es user, lo mismo pero con user
    //header a la localizacion que corresponda






}




?>