<?php
require_once '../config/conexionBaseDatos.php'; 

class formValoresAntopoModel {
    private $db;
    private $lastError;
    

    public function __construct() {
        $this->db =  ConexionBD::conexion(); // Método estático para obtener conexión
    }

    public function insertarDatos($datos) {
        try {

            $sql = "INSERT INTO antropometrico (
                cod_participante, Ant1, Ant2, Ant3, Ant4, Ant5, Ant6, Ant7, Ant8,
                Ant9, Ant10, Ant11, Ant12, Ant13, Ant14, Ant15, Ant16, Ant17,
                Ant18_BD, Ant18_BI, Ant18_PD, Ant18_PI,
                Ant19_BD, Ant19_BI, Ant19_PD, Ant19_PI,
                Ant20, Ant21
            ) VALUES (
                :cod_participante, :Ant1, :Ant2, :Ant3, :Ant4, :Ant5, :Ant6, :Ant7, :Ant8,
                :Ant9, :Ant10, :Ant11, :Ant12, :Ant13, :Ant14, :Ant15, :Ant16, :Ant17,
                :Ant18_BD, :Ant18_BI, :Ant18_PD, :Ant18_PI,
                :Ant19_BD, :Ant19_BI, :Ant19_PD, :Ant19_PI,
                :Ant20, :Ant21
            )";

            $stmt = $this->db->prepare($sql);

            $cod_participante = intval($datos['cod_participante']); 
            
            $stmt->bindParam(':cod_participante', $cod_participante, PDO::PARAM_INT);
            $stmt->bindParam(':Ant1', $datos['Ant1'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant2', $datos['Ant2'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant3', $datos['Ant3'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant4', $datos['Ant4'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant5', $datos['Ant5'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant6', $datos['Ant6'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant7', $datos['Ant7'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant8', $datos['Ant8'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant9', $datos['Ant9'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant10', $datos['Ant10'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant11', $datos['Ant11'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant12', $datos['Ant12'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant13', $datos['Ant13'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant14', $datos['Ant14'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant15', $datos['Ant15'], PDO::PARAM_INT);
            $stmt->bindParam(':Ant16', $datos['Ant16'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant17', $datos['Ant17'], PDO::PARAM_INT);
            $stmt->bindParam(':Ant18_BD', $datos['Ant18_BD'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant18_BI', $datos['Ant18_BI'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant18_PD', $datos['Ant18_PD'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant18_PI', $datos['Ant18_PI'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant19_BD', $datos['Ant19_BD'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant19_BI', $datos['Ant19_BI'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant19_PD', $datos['Ant19_PD'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant19_PI', $datos['Ant19_PI'], PDO::PARAM_STR);
            $stmt->bindParam(':Ant20', $datos['Ant20'], PDO::PARAM_INT);
            $stmt->bindParam(':Ant21', $datos['Ant21'], PDO::PARAM_STR);            

            return $stmt->execute();
            
        } catch (PDOException $e) {
            // Registrar el error en un log
            error_log("Error al insertar datos antropométricos: " . $e->getMessage());
            return false;
        }
    }

    public function verificarParticipanteExiste($cod_participante) {
        try {
            $sql = "SELECT cod_participante FROM antropometrico WHERE cod_participante = :cod_participante";
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