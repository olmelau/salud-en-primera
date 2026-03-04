<?php

require_once '../app/models/loginModel.php';



class LoginController
{

    public function procesarLogin($datos)
    {
       //Verificamos que el envio del fromulario sea por POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            // Si alguien intenta acceder por GET, lo redirigimos al home
            header('Location: index.php?controller=home&action=home');
            exit(); // IMPORTANTE: detener la ejecución
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
                    header('Location: index.php?controller=admin&action=mostrarPaginaAdmin');
                    
                    break;

                case 'participante':
                    $_SESSION['rol'] = $rolname;
                    $_SESSION['id_user'] = $id_user;
                    header('index.php?controller=participante&action=mostrarPaginaParticipante');
                    break;

                default:
                    echo "Error. Usuario no encontrado";
                    break;
            }

        }











    }

}


?>