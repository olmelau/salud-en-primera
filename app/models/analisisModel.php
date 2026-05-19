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

    //Siempre nos llegara el cod_participante para cualquier metodo de analisis.
    public function formSuenoCompletado($cod_participante){

        try {
            $sql = "SELECT cod_participante FROM sueno WHERE cod_participante = :cod_participante";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':cod_participante', $cod_participante, PDO::PARAM_INT); //Siempre debe ser INT.
            $stmt->execute();
            if($stmt->rowCount() > 0) { //Teniamos otra lógica distinta para el return pero nos daba problemas y acabamos usando el rowcount.
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
        //Misma lógica que para Sueño.
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
        //Misma lógica que para Sueño.
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
        //Misma lógica que para Sueño.
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
            //Al querer devolver un array (Aunque sea solo una fila) hacemos el fetch Assoc, para recorrerlo posteriormente mejor en el view. 
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

    /**
     * Familia profesional vs Clasificación IMC
     */
    public function getFamiliaProfesionalPorIMC()
    {
        try {
            $sql = "SELECT 
                        p.familia_profesional as categoria,
                        a.Ant4 as clasificacion,
                        COUNT(*) as cantidad
                    FROM participante p
                    INNER JOIN antropometrico a ON p.cod_participante = a.cod_participante
                    WHERE a.Ant4 IS NOT NULL
                    GROUP BY p.familia_profesional, a.Ant4
                    ORDER BY p.familia_profesional, a.Ant4";
            
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en getFamiliaProfesionalPorIMC: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Sexo vs Clasificación IMC
     */
    public function getSexoPorIMC()
    {
        try {
            $sql = "SELECT 
                        p.sexo as categoria,
                        a.Ant4 as clasificacion,
                        COUNT(*) as cantidad
                    FROM participante p
                    INNER JOIN antropometrico a ON p.cod_participante = a.cod_participante
                    WHERE a.Ant4 IS NOT NULL
                    GROUP BY p.sexo, a.Ant4
                    ORDER BY p.sexo, a.Ant4";
            
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en getSexoPorIMC: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Centro educativo vs Clasificación IMC
     */
    public function getCentroEducativoPorIMC()
    {
        try {
            $sql = "SELECT 
                        p.centro_educativo as categoria,
                        a.Ant4 as clasificacion,
                        COUNT(*) as cantidad
                    FROM participante p
                    INNER JOIN antropometrico a ON p.cod_participante = a.cod_participante
                    WHERE a.Ant4 IS NOT NULL
                    GROUP BY p.centro_educativo, a.Ant4
                    ORDER BY p.centro_educativo, a.Ant4";
            
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en getCentroEducativoPorIMC: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Familia profesional vs IMC (valores numéricos para nube de puntos)
     */
    public function getFamiliaProfesionalIMCValor()
    {
        try {
            $sql = "SELECT 
                        p.familia_profesional as categoria,
                        a.Ant3 as valor_imc,
                        a.Ant4 as clasificacion
                    FROM participante p
                    INNER JOIN antropometrico a ON p.cod_participante = a.cod_participante
                    WHERE a.Ant3 IS NOT NULL
                    ORDER BY p.familia_profesional";
            
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en getFamiliaProfesionalIMCValor: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Familia profesional vs ICA (Índice Cintura-Altura)
     */
    public function getFamiliaProfesionalPorICA()
    {
        try {
            $sql = "SELECT 
                        p.familia_profesional as categoria,
                        a.Ant8 as valor_ica,
                        CASE 
                            WHEN a.Ant8 >= 0.5 THEN 'Riesgo alto'
                            ELSE 'Riesgo bajo'
                        END as clasificacion_riesgo
                    FROM participante p
                    INNER JOIN antropometrico a ON p.cod_participante = a.cod_participante
                    WHERE a.Ant8 IS NOT NULL
                    ORDER BY p.familia_profesional";
            
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en getFamiliaProfesionalPorICA: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Centro educativo vs ICA
     */
    public function getCentroEducativoPorICA()
    {
        try {
            $sql = "SELECT 
                        p.centro_educativo as categoria,
                        a.Ant8 as valor_ica,
                        CASE 
                            WHEN a.Ant8 >= 0.5 THEN 'Riesgo alto'
                            ELSE 'Riesgo bajo'
                        END as clasificacion_riesgo
                    FROM participante p
                    INNER JOIN antropometrico a ON p.cod_participante = a.cod_participante
                    WHERE a.Ant8 IS NOT NULL
                    ORDER BY p.centro_educativo";
            
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en getCentroEducativoPorICA: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Sexo vs ICC (Índice Cintura-Cadera)
     */
    public function getSexoPorICC()
    {
        try {
            $sql = "SELECT 
                        p.sexo as categoria,
                        a.Ant7 as valor_icc,
                        CASE 
                            WHEN (p.sexo = 'Hombre' AND a.Ant7 >= 0.9) OR 
                                 (p.sexo = 'Mujer' AND a.Ant7 >= 0.85) THEN 'Riesgo alto'
                            ELSE 'Riesgo bajo'
                        END as clasificacion_riesgo
                    FROM participante p
                    INNER JOIN antropometrico a ON p.cod_participante = a.cod_participante
                    WHERE a.Ant7 IS NOT NULL
                    ORDER BY p.sexo";
            
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en getSexoPorICC: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Grasa corporal total vs IMC (nube de puntos)
     */
    public function getGrasaCorporalIMC()
    {
        try {
            $sql = "SELECT 
                        a.Ant13 as grasa_corporal,
                        a.Ant3 as valor_imc,
                        p.sexo as sexo,
                        a.Ant4 as clasificacion_imc
                    FROM antropometrico a
                    INNER JOIN participante p ON a.cod_participante = p.cod_participante
                    WHERE a.Ant13 IS NOT NULL AND a.Ant3 IS NOT NULL
                    ORDER BY a.Ant13";
            
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en getGrasaCorporalIMC: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Puntuación dieta mediterránea vs IMC
     */
    public function getDietaMediterraneaIMC()
    {
        try {
            $sql = "SELECT 
                        (al.Ali1 + al.Ali2 + al.Ali3 + al.Ali4 + al.Ali5 + al.Ali6 + 
                         al.Ali7 + al.Ali8 + al.Ali9 + al.Ali10 + al.Ali11 + al.Ali12 + 
                         al.Ali13 + al.Ali14) as puntuacion_dieta,
                        a.Ant3 as valor_imc,
                        a.Ant4 as clasificacion_imc
                    FROM alimentacion al
                    INNER JOIN antropometrico a ON al.cod_participante = a.cod_participante
                    WHERE a.Ant3 IS NOT NULL
                    ORDER BY puntuacion_dieta";
            
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en getDietaMediterraneaIMC: " . $e->getMessage());
            return [];
        }
    }
}
?>