<?php

require_once '../models/loginModel.php';



class LoginController
{



    public function procesarLogin($datos)
    {

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

                    $_SESSION[$rolname];
                    $_SESSION[$id_user];
                    header('index.php?controller=admin&action=mostrarPaginaAdmin');

                case 'participante':
                    $_SESSION[$rolname];
                    $_SESSION[$id_user];
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