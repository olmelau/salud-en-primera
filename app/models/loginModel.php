<?php

    require_once '../config/conexionBaseDatos.php';

    class LoginModel{

        private $db;

        public function __construct(){

            $this->db = ConexionBD::conexion();
        }

        public function buscarUsuario($usuario, $password){

            // Preparamos la consulta
            $sql = "SELECT id_user FROM usuario
                    WHERE username = :usuario AND password = :password";

            //Tiene que coincidir tanto usuario como contraseña de forma exacta incluyendo Mayusculas o Minusculas.
            //Se podría hacer que el usuario lo mirase con LIKE en vez de =, pero no creemos que este mal ser Case Sensitive.
            
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);

            $stmt->execute();
            
            $usuario = $stmt->fetch();

            return $usuario[0]; //Devolvemos directamente el valor en la posicion 0, no nos interesa un array, si no el id_user.

        }

        public function buscarRol($id_user){

            //Esta query devuelve el rolname [administrador o participante]
            $sql = "SELECT r.rolname FROM user_rol ur
                    INNER JOIN rol r ON ur.id_rol = r.id_rol
                    WHERE ur.id_user = :id_user";
            //Hay que relacionar la tabla rol con la de usuarios rol. Si no hubiesemos sacado el id_user en la anterior consulta, nos tocaria hacer un JOIN
            //tambien de usuario, pero asi es menos carga en las consultas.
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);
            $stmt->execute();

            $rolname = $stmt->fetch();

            return $rolname[0]; 
            //Solo con el String "administrador" o "participante" nos sirve, no hace falta nada mas.
            

        }



    }



?>