<?php
require_once '../config/conexionBaseDatos.php';

class formInternacionalAFModel
{
    private $db;

    public function __construct()
    {
        $this->db = ConexionBD::conexion(); // Método estático para obtener conexión
    }

    public function insertarDatos($datos)
    {
        try {

            $sql = "INSERT INTO alimentacion (
                cod_participante, Ali1, Ali2, Ali3, Ali4, Ali5, Ali6, Ali7, Ali8, Ali9, Ali10, Ali11, Ali12 ,Ali13, Ali14
            ) VALUES (
                :cod_participante, :Ali1, :Ali2, :Ali3, :Ali4, :Ali5, :Ali6, :Ali7, :Ali8, :Ali9, :Ali10, :Ali11, :Ali12 ,:Ali13, :Ali14
            )";

            $stmt = $this->db->prepare($sql);

            $cod_participante = intval($datos['cod_participante']); 
            
            $stmt->bindParam(':cod_participante', $cod_participante, PDO::PARAM_INT);
            $stmt->bindParam(':Ali1', $datos['Ali1'], PDO::PARAM_INT);
            $stmt->bindParam(':Ali2', $datos['Ali2'], PDO::PARAM_INT);
            $stmt->bindParam(':Ali3', $datos['Ali3'], PDO::PARAM_INT);
            $stmt->bindParam(':Ali4', $datos['Ali4'], PDO::PARAM_INT);
            $stmt->bindParam(':Ali5', $datos['Ali5'], PDO::PARAM_INT);
            $stmt->bindParam(':Ali6', $datos['Ali6'], PDO::PARAM_INT);
            $stmt->bindParam(':Ali7', $datos['Ali7'], PDO::PARAM_INT);
            $stmt->bindParam(':Ali8', $datos['Ali8'], PDO::PARAM_INT);
            $stmt->bindParam(':Ali9', $datos['Ali9'], PDO::PARAM_INT);
            $stmt->bindParam(':Ali10', $datos['Ali10'], PDO::PARAM_INT);
            $stmt->bindParam(':Ali11', $datos['Ali11'], PDO::PARAM_INT);
            $stmt->bindParam(':Ali12', $datos['Ali12'], PDO::PARAM_INT);
            $stmt->bindParam(':Ali13', $datos['Ali13'], PDO::PARAM_INT);
            $stmt->bindParam(':Ali14', $datos['Ali14'], PDO::PARAM_INT);

            return $stmt->execute();

        } catch (PDOException $e) {
            // Registrar el error en un log
            error_log("Error al insertar datos actividad: " . $e->getMessage());
            return false;
        }
    }

    public function verificarParticipanteExiste($cod_participante)
    {
        try {
            $sql = "SELECT cod_participante FROM alimentacion WHERE cod_participante = :cod_participante";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':cod_participante', $cod_participante, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
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