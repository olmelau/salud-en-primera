<?php

require_once '../app/models/loginModel.php';

class LoginController
{

    public function procesarLogin($datos)
    {
        session_start();
        
        //Verificamos que el envio del fromulario sea por POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            // Si alguien intenta acceder por GET, lo redirigimos al home
            // Para iniciar sesión siempre tiene que ser POST
            header('Location: index.php?controller=home&action=home');
            exit(); 
        }

        //De los datos que nos llegan por parametros, sacamos la info del usuario
        //en este caso: $user y $password
        //La lógica de guardar en el array datos es del Index.
        //IMPORTANTE EN EL INDEX SE LLAMA $parametros. Es el mismo array pero aquí le damos otro nombre.
        $usuario = $datos['usuario'];
        $password = $datos['password'];


        $modelo = new LoginModel();
        $id_user = $modelo->buscarUsuario($usuario, $password);
        //Si no coincide Usuario y Contraseña, dara false.

        if ($id_user) { //Si ha coincidido.

            $rolname = $modelo->buscarRol($id_user); //Para saber si es participante solo o admin.

            switch ($rolname) {
                case 'administrador':
                    $_SESSION['rol'] = $rolname;
                    $_SESSION['id_user'] = $id_user;
                    $_SESSION['autenticado'] = true; //Este es el único lugar donde se hace true esta variable. Si no ha iniciado sesión correctamente dando true al buscar usuario.
                    //Cada vez que llegue a un formulario o página se le redirige a home si es false.
                    $_SESSION['cod_participante'] = $datos['cod_participante'];
                    //Este debería sacarse con una consulta en lugar de venir del formulario.
                    //La base de datos no relaciona el usuario con el participante, cuando cualquier usuario puede hacer los formularios.
                    //Debería darse a los alumnos un codigo y una contraseña, es decir, que cada participante sea un usuario con menos permisos, no dejarlos separados en dos tablas no relacionadas.
                    header('Location: index.php?controller=admin&action=mostrarPaginaAdmin');
                    break;

                case 'participante':
                    //Los comentarios de Administrador son los mismos que los que vendrían aquí.
                    $_SESSION['rol'] = $rolname;
                    $_SESSION['id_user'] = $id_user;
                    $_SESSION['autenticado'] = true;
                    $_SESSION['cod_participante'] = $datos['cod_participante'];
                    header('Location: index.php?controller=participante&action=mostrarPaginaParticipante');
                    break;

                default: //Esta de segurirdad, si el usuario existe pero no tiene rol, aquí si la base de datos es correcta no se llega nunca.
                    echo "Error. Usuario no encontrado";
                    break;
            }

        } else { //Si no ha coincidido.
            //mostrar el error de credenciales incorrectas
            $_SESSION['error_login'] = "Usuario o contraseña incorrectos";
            header('Location: index.php?controller=home&action=home');
        exit();
        }


    }

    public function logout()
    {
        // Destruir SESIÓN COMPLETAMENTE
        $_SESSION = []; // Vaciar array de sesión

        
        // Destruir la cookie de sesión
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        
        
        // Destruir la sesión
        session_destroy();



        // Redirigir al home
        header('Location: index.php?controller=home&action=home');
        exit();
    }

}


?>