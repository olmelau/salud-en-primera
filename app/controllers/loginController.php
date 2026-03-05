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
            header('Location: index.php?controller=home&action=home');
            exit(); 
        }

        //de los datos que nos llegan por parametros, sacamos la info del usuario
        //en este caso: $user y $password
        $usuario = $datos['usuario'];
        $password = $datos['password'];


        $modelo = new LoginModel();
        $id_user = $modelo->buscarUsuario($usuario, $password);

        if ($id_user) {

            $rolname = $modelo->buscarRol($id_user);

            switch ($rolname) {

                case 'administrador':
                    $_SESSION['rol'] = $rolname;
                    $_SESSION['id_user'] = $id_user;
                    $_SESSION['autenticado'] = true;
                    header('Location: index.php?controller=admin&action=mostrarPaginaAdmin');
                    break;

                case 'participante':
                    $_SESSION['rol'] = $rolname;
                    $_SESSION['id_user'] = $id_user;
                    $_SESSION['autenticado'] = true;
                    header('Location: index.php?controller=participante&action=mostrarPaginaParticipante');
                    break;

                default:
                    echo "Error. Usuario no encontrado";
                    break;
            }

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