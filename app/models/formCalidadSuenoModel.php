<?php
require_once '../config/conexionBaseDatos.php'; 

class formCalidadSuenoModel {
    private $db;

    public function __construct() {
        $this->db =  ConexionBD::conexion(); // Método estático para obtener conexión
    }

    public function insertarDatos($datos) {
        try {
            //Hay que tener mucho cuidado que el nombre de los campos sea exactamente igual que en la tabla de la base de datos.
            $sql = "INSERT INTO sueno (
                cod_participante, Sue1, Sue2, Sue3, Sue4, Sue5a, Sue5b, Sue5c, Sue5d,
                Sue5e, Sue5f, Sue5g, Sue5h, Sue5i, Sue5j, Sue5j_Desc, Sue6, Sue7, Sue8,
                Sue9, Sue10
            ) VALUES (
                :cod_participante, :Sue1, :Sue2, :Sue3, :Sue4, :Sue5a, :Sue5b, :Sue5c, :Sue5d,
                :Sue5e, :Sue5f, :Sue5g, :Sue5h, :Sue5i, :Sue5j, :Sue5j_Desc, :Sue6, :Sue7, :Sue8,
                :Sue9, :Sue10
            )";

            $stmt = $this->db->prepare($sql);
            
            $cod_participante = intval($datos['cod_participante']); //Al venir de Session, a veces hacia cosas raras y ha sido mejor hacer la conversion directa.
            
            
            $stmt->bindParam(':cod_participante', $cod_participante, PDO::PARAM_INT);
            $stmt->bindParam(':Sue1', $datos['Sue1'], PDO::PARAM_STR);
            $stmt->bindParam(':Sue2', $datos['Sue2'], PDO::PARAM_INT);
            $stmt->bindParam(':Sue3', $datos['Sue3'], PDO::PARAM_STR);
            $stmt->bindParam(':Sue4', $datos['Sue4'], PDO::PARAM_STR);
            $stmt->bindParam(':Sue5a', $datos['Sue5a'], PDO::PARAM_INT);
            $stmt->bindParam(':Sue5b', $datos['Sue5b'], PDO::PARAM_INT);
            $stmt->bindParam(':Sue5c', $datos['Sue5c'], PDO::PARAM_INT);
            $stmt->bindParam(':Sue5d', $datos['Sue5d'], PDO::PARAM_INT);
            $stmt->bindParam(':Sue5e', $datos['Sue5e'], PDO::PARAM_INT);
            $stmt->bindParam(':Sue5f', $datos['Sue5f'], PDO::PARAM_INT);
            $stmt->bindParam(':Sue5g', $datos['Sue5g'], PDO::PARAM_INT);
            $stmt->bindParam(':Sue5h', $datos['Sue5h'], PDO::PARAM_INT);
            $stmt->bindParam(':Sue5i', $datos['Sue5i'], PDO::PARAM_INT);
            $stmt->bindParam(':Sue5j', $datos['Sue5j'], PDO::PARAM_INT);
            $stmt->bindParam(':Sue5j_Desc', $datos['otras_razones_desc'], PDO::PARAM_STR);
            $stmt->bindParam(':Sue6', $datos['Sue6'], PDO::PARAM_INT);
            $stmt->bindParam(':Sue7', $datos['Sue7'], PDO::PARAM_INT);
            $stmt->bindParam(':Sue8', $datos['Sue8'], PDO::PARAM_INT);
            $stmt->bindParam(':Sue9', $datos['Sue9'], PDO::PARAM_INT);
            $stmt->bindParam(':Sue10', $datos['Sue10'], PDO::PARAM_INT);
            //CUIDADO CON LOS TINYINT DE LA BASE DE DATOS.
            
            return $stmt->execute();
            
        } catch (PDOException $e) {
            error_log("Error al insertar datos antropométricos: " . $e->getMessage());
            return false;
        }
    }

    public function verificarParticipanteExiste($cod_participante) {
        try {
            $sql = "SELECT cod_participante FROM sueno WHERE cod_participante = :cod_participante";
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