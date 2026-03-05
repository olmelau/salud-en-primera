<?php
require_once '../config/conexionBaseDatos.php';

class NuevoParticipanteModel
{

    private $db;

    public function __construct()
    {
        $this->db = ConexionBD::conexion();
    }

    public function insertarNuevoParticipante($datosParticipante)
    {

        try {

            $sql = "INSERT INTO participante (cod_participante, centro_educativo, familia_profesional, edad, sexo)
                VALUES (:cod_participante, :centro_educativo, :familia_profesional, :edad, :sexo)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":cod_participante", $datosParticipante['cod_participante'], PDO::PARAM_INT);
            $stmt->bindParam(":centro_educativo", $datosParticipante['centro_educativo'], PDO::PARAM_STR);
            $stmt->bindParam(":familia_profesional", $datosParticipante['familia_profesional'], PDO::PARAM_STR);
            $stmt->bindParam(":edad", $datosParticipante['edad'], PDO::PARAM_INT);
            $stmt->bindParam(":sexo", $datosParticipante['sexo'], PDO::PARAM_STR);

            $stmt->execute();
            return true;
            
        } catch (PDOException $e) {
            // Registrar el error en un log
            error_log("Error al insertar nuevo participante: " . $e->getMessage());
            return false;
        }

    }

     public function verificarParticipanteExiste($cod_participante) {
        try {
            $sql = "SELECT cod_participante FROM participante WHERE cod_participante = :cod_participante";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':cod_participante', $cod_participante, PDO::PARAM_INT);
            $stmt->execute();
            if($stmt->rowCount() > 0) {
                return true; 
            } else {
                return false; // El participante no existe
            }
            
        } catch (PDOException $e) {
            error_log("Error al verificar participante: " . $e->getMessage());
            return false;
        }
    }



}


?>