<?php
require_once '../config/conexionBaseDatos.php'; 

class formInternacionalAFModel {
    private $db;

    public function __construct() {
        $this->db =  ConexionBD::conexion();
    }

    public function insertarDatos($datos) {
        try {

            $sql = "INSERT INTO actividad (
                cod_participante, AcF1, AcF2, AcF3, AcF4, AcF5, AcF6, AcF7
            ) VALUES (
                :cod_participante, :AcF1, :AcF2, :AcF3, :AcF4, :AcF5, :AcF6, :AcF7
            )";

            $stmt = $this->db->prepare($sql);
            
            $cod_participante = intval($datos['cod_participante']); 
            
            $stmt->bindParam(':cod_participante', $cod_participante, PDO::PARAM_INT);
            $stmt->bindParam(':AcF1', $datos['AcF1'], PDO::PARAM_STR);
            $stmt->bindParam(':AcF2', $datos['AcF2'], PDO::PARAM_STR);
            $stmt->bindParam(':AcF3', $datos['AcF3'], PDO::PARAM_STR);
            $stmt->bindParam(':AcF4', $datos['AcF4'], PDO::PARAM_STR);
            $stmt->bindParam(':AcF5', $datos['AcF5'], PDO::PARAM_STR);
            $stmt->bindParam(':AcF6', $datos['AcF6'], PDO::PARAM_STR);
            $stmt->bindParam(':AcF7', $datos['AcF7'], PDO::PARAM_STR);
            
            return $stmt->execute();
            
        } catch (PDOException $e) {
            error_log("Error al insertar datos actividad: " . $e->getMessage());
            return false;
        }
    }

    public function verificarParticipanteExiste($cod_participante) {
        try {
            $sql = "SELECT cod_participante FROM actividad WHERE cod_participante = :cod_participante";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':cod_participante', $cod_participante, PDO::PARAM_INT);
            $stmt->execute();
            if($stmt->rowCount() > 0) {
                return true; 
            } else {
                return false;
            }
            
        } catch (PDOException $e) {
            error_log("Error al verificar participante: " . $e->getMessage());
            return false;
        }
    }

    
}
?>