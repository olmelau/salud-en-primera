<?php
require_once '../config/conexionBaseDatos.php'; 

class analisisModel {
    private $db;

    public function __construct() {
        $this->db =  ConexionBD::conexion(); // Método estático para obtener conexión
    }

    /*
    Como se tienen que mostrar los analisis solamente si se han completado, iremos llamando a metodos para comprobar, y si son ciertos, metodo para obtener los datos y un metodo imprimir de la vista.
    */
    public function formSuenoCompletado($cod_participante){

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
            return false; //Se almacena en la siguiente ruta: C:\xampp\apache\logs
        }

    }

    public function formAntopoCompletado($cod_participante){
        try {
            $sql = "SELECT cod_participante FROM antropometrico WHERE cod_participante = :cod_participante";
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

    public function formDietaCompletado($cod_participante){
        try {
            $sql = "SELECT cod_participante FROM alimentacion WHERE cod_participante = :cod_participante";
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

    public function formFisicaCompletado($cod_participante){
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

    public function recogerDatosSueno($cod_participante){
        try {
            $sql = "SELECT * FROM sueno WHERE cod_participante = :cod_participante";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':cod_participante', $cod_participante, PDO::PARAM_INT);
            
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
            
        } catch (PDOException $e) {
            error_log("Error al verificar participante: " . $e->getMessage());
            return false;
        }
    }

    public function recogerDatosAntopo($cod_participante){
        try {
            $sql = "SELECT * FROM  antropometrico  WHERE cod_participante = :cod_participante";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':cod_participante', $cod_participante, PDO::PARAM_INT);
            
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
            
        } catch (PDOException $e) {
            error_log("Error al verificar participante: " . $e->getMessage());
            return false;
        }
    }

    public function recogerDatosDieta($cod_participante){
        try {
            $sql = "SELECT * FROM  alimentacion  WHERE cod_participante = :cod_participante";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':cod_participante', $cod_participante, PDO::PARAM_INT);
            
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
            
        } catch (PDOException $e) {
            error_log("Error al verificar participante: " . $e->getMessage());
            return false;
        }
    }

    public function recogerDatosFisica($cod_participante){
        try {
            $sql = "SELECT * FROM  actividad  WHERE cod_participante = :cod_participante";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':cod_participante', $cod_participante, PDO::PARAM_INT);
            
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
            
        } catch (PDOException $e) {
            error_log("Error al verificar participante: " . $e->getMessage());
            return false;
        }
    }
}
?>