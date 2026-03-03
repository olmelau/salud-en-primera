<?php

    //models/loginModel

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
            
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);

            $stmt->execute();
            
            $usuario = $stmt->fetch();

            return $usuario[0];

        }

        public function buscarRol($id_user){

            //esta query devuelve el rolname [administrador o participante]
            $sql = "SELECT r.rolname FROM user_rol ur
                    INNER JOIN rol r ON ur.id_rol = r.id_rol
                    WHERE ur.id_user = :id_user";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);
            $stmt->execute();

            $rolname = $stmt->fetch();

            return $rolname[0]; 
            

        }



    }



?>