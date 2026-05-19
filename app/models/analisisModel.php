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
    public function getDietaGrasaCorporal()
{
    try {
        $sql = "SELECT 
                    (al.Ali1 + al.Ali2 + al.Ali3 + al.Ali4 + al.Ali5 + al.Ali6 + 
                     al.Ali7 + al.Ali8 + al.Ali9 + al.Ali10 + al.Ali11 + al.Ali12 + 
                     al.Ali13 + al.Ali14) as puntuacion_dieta,
                    a.Ant13 as grasa_corporal,
                    a.Ant4 as clasificacion_imc
                FROM alimentacion al
                INNER JOIN antropometrico a ON al.cod_participante = a.cod_participante
                WHERE a.Ant13 IS NOT NULL
                ORDER BY puntuacion_dieta";
        
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error en getDietaGrasaCorporal: " . $e->getMessage());
        return [];
    }
}

/**
 * Puntuación dieta mediterránea vs Masa muscular total
 */
public function getDietaMasaMuscular()
{
    try {
        $sql = "SELECT 
                    (al.Ali1 + al.Ali2 + al.Ali3 + al.Ali4 + al.Ali5 + al.Ali6 + 
                     al.Ali7 + al.Ali8 + al.Ali9 + al.Ali10 + al.Ali11 + al.Ali12 + 
                     al.Ali13 + al.Ali14) as puntuacion_dieta,
                    a.Ant12 as masa_muscular,
                    a.Ant4 as clasificacion_imc
                FROM alimentacion al
                INNER JOIN antropometrico a ON al.cod_participante = a.cod_participante
                WHERE a.Ant12 IS NOT NULL
                ORDER BY puntuacion_dieta";
        
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error en getDietaMasaMuscular: " . $e->getMessage());
        return [];
    }
}

/**
 * Calcular puntuación de actividad física (IPAQ simplificado)
 * Basado en los MET-minutos/semana
 */
private function calcularPuntuacionActividadFisica($datos)
{
    if (empty($datos)) return 0;
    
    $puntuacion = 0;
    
    // Actividad vigorosa: días * minutos * 8 METs
    if ($datos['AcF1'] > 0 && $datos['AcF2'] > 0) {
        $puntuacion += $datos['AcF1'] * $datos['AcF2'] * 8;
    }
    
    // Actividad moderada: días * minutos * 4 METs
    if ($datos['AcF3'] > 0 && $datos['AcF4'] > 0) {
        $puntuacion += $datos['AcF3'] * $datos['AcF4'] * 4;
    }
    
    // Caminata: días * minutos * 3.3 METs
    if ($datos['AcF5'] > 0 && $datos['AcF6'] > 0) {
        $puntuacion += $datos['AcF5'] * $datos['AcF6'] * 3.3;
    }
    
    return round($puntuacion, 2);
}

/**
 * Clasificar nivel de actividad física según IPAQ
 */
private function clasificarActividadFisica($puntuacion, $datos)
{
    // Alto: >= 3000 MET-min/semana o >= 3 días de actividad vigorosa con >= 1500 MET-min/semana
    if ($puntuacion >= 3000 || 
        ($datos['AcF1'] >= 3 && $puntuacion >= 1500)) {
        return 'Alto';
    }
    
    // Moderado: >= 600 MET-min/semana o algún tipo de actividad
    if ($puntuacion >= 600) {
        return 'Moderado';
    }
    
    // Bajo: < 600 MET-min/semana
    return 'Bajo';
}

/**
 * Puntuación actividad física vs IMC
 */
public function getActividadFisicaIMC()
{
    try {
        $sql = "SELECT 
                    ac.AcF1, ac.AcF2, ac.AcF3, ac.AcF4, ac.AcF5, ac.AcF6, ac.AcF7,
                    a.Ant3 as valor_imc,
                    a.Ant4 as clasificacion_imc
                FROM actividad ac
                INNER JOIN antropometrico a ON ac.cod_participante = a.cod_participante
                WHERE a.Ant3 IS NOT NULL";
        
        $stmt = $this->db->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Calcular puntuación para cada registro
        $datosFormateados = [];
        foreach ($resultados as $row) {
            $puntuacion = $this->calcularPuntuacionActividadFisica($row);
            $nivel = $this->clasificarActividadFisica($puntuacion, $row);
            
            $datosFormateados[] = [
                'puntuacion_actividad' => $puntuacion,
                'nivel_actividad' => $nivel,
                'valor_imc' => $row['valor_imc'],
                'clasificacion_imc' => $row['clasificacion_imc']
            ];
        }
        
        return $datosFormateados;
    } catch (PDOException $e) {
        error_log("Error en getActividadFisicaIMC: " . $e->getMessage());
        return [];
    }
}

/**
 * Puntuación actividad física vs ICA
 */
public function getActividadFisicaICA()
{
    try {
        $sql = "SELECT 
                    ac.AcF1, ac.AcF2, ac.AcF3, ac.AcF4, ac.AcF5, ac.AcF6,
                    a.Ant8 as valor_ica,
                    a.Ant4 as clasificacion_imc
                FROM actividad ac
                INNER JOIN antropometrico a ON ac.cod_participante = a.cod_participante
                WHERE a.Ant8 IS NOT NULL";
        
        $stmt = $this->db->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $datosFormateados = [];
        foreach ($resultados as $row) {
            $puntuacion = $this->calcularPuntuacionActividadFisica($row);
            $nivel = $this->clasificarActividadFisica($puntuacion, $row);
            
            $datosFormateados[] = [
                'puntuacion_actividad' => $puntuacion,
                'nivel_actividad' => $nivel,
                'valor_ica' => $row['valor_ica'],
                'clasificacion_imc' => $row['clasificacion_imc']
            ];
        }
        
        return $datosFormateados;
    } catch (PDOException $e) {
        error_log("Error en getActividadFisicaICA: " . $e->getMessage());
        return [];
    }
}

/**
 * Puntuación actividad física vs ICC
 */
public function getActividadFisicaICC()
{
    try {
        $sql = "SELECT 
                    ac.AcF1, ac.AcF2, ac.AcF3, ac.AcF4, ac.AcF5, ac.AcF6,
                    a.Ant7 as valor_icc,
                    a.Ant4 as clasificacion_imc
                FROM actividad ac
                INNER JOIN antropometrico a ON ac.cod_participante = a.cod_participante
                WHERE a.Ant7 IS NOT NULL";
        
        $stmt = $this->db->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $datosFormateados = [];
        foreach ($resultados as $row) {
            $puntuacion = $this->calcularPuntuacionActividadFisica($row);
            $nivel = $this->clasificarActividadFisica($puntuacion, $row);
            
            $datosFormateados[] = [
                'puntuacion_actividad' => $puntuacion,
                'nivel_actividad' => $nivel,
                'valor_icc' => $row['valor_icc'],
                'clasificacion_imc' => $row['clasificacion_imc']
            ];
        }
        
        return $datosFormateados;
    } catch (PDOException $e) {
        error_log("Error en getActividadFisicaICC: " . $e->getMessage());
        return [];
    }
}

/**
 * Puntuación actividad física vs Grasa corporal total
 */
public function getActividadFisicaGrasaCorporal()
{
    try {
        $sql = "SELECT 
                    ac.AcF1, ac.AcF2, ac.AcF3, ac.AcF4, ac.AcF5, ac.AcF6,
                    a.Ant13 as grasa_corporal,
                    a.Ant4 as clasificacion_imc
                FROM actividad ac
                INNER JOIN antropometrico a ON ac.cod_participante = a.cod_participante
                WHERE a.Ant13 IS NOT NULL";
        
        $stmt = $this->db->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $datosFormateados = [];
        foreach ($resultados as $row) {
            $puntuacion = $this->calcularPuntuacionActividadFisica($row);
            $nivel = $this->clasificarActividadFisica($puntuacion, $row);
            
            $datosFormateados[] = [
                'puntuacion_actividad' => $puntuacion,
                'nivel_actividad' => $nivel,
                'grasa_corporal' => $row['grasa_corporal'],
                'clasificacion_imc' => $row['clasificacion_imc']
            ];
        }
        
        return $datosFormateados;
    } catch (PDOException $e) {
        error_log("Error en getActividadFisicaGrasaCorporal: " . $e->getMessage());
        return [];
    }
}

/**
 * Puntuación actividad física vs Masa muscular total
 */
public function getActividadFisicaMasaMuscular()
{
    try {
        $sql = "SELECT 
                    ac.AcF1, ac.AcF2, ac.AcF3, ac.AcF4, ac.AcF5, ac.AcF6,
                    a.Ant12 as masa_muscular,
                    a.Ant4 as clasificacion_imc
                FROM actividad ac
                INNER JOIN antropometrico a ON ac.cod_participante = a.cod_participante
                WHERE a.Ant12 IS NOT NULL";
        
        $stmt = $this->db->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $datosFormateados = [];
        foreach ($resultados as $row) {
            $puntuacion = $this->calcularPuntuacionActividadFisica($row);
            $nivel = $this->clasificarActividadFisica($puntuacion, $row);
            
            $datosFormateados[] = [
                'puntuacion_actividad' => $puntuacion,
                'nivel_actividad' => $nivel,
                'masa_muscular' => $row['masa_muscular'],
                'clasificacion_imc' => $row['clasificacion_imc']
            ];
        }
        
        return $datosFormateados;
    } catch (PDOException $e) {
        error_log("Error en getActividadFisicaMasaMuscular: " . $e->getMessage());
        return [];
    }
}

/**
 * Calcular puntuación de calidad de sueño (PSQI simplificado)
 * Basado en los componentes del cuestionario de Pittsburgh
 */
private function calcularPuntuacionSueno($datos)
{
    if (empty($datos)) return 0;
    
    $puntuacion = 0;
    
    // Componente 1: Calidad subjetiva del sueño (Sue6)
    if (isset($datos['Sue6'])) {
        $puntuacion += $datos['Sue6'];
    }
    
    // Componente 2: Latencia del sueño (Sue2 + Sue5a)
    if (isset($datos['Sue2'])) {
        $puntuacion += $datos['Sue2']; // Minutos para dormirse
    }
    if (isset($datos['Sue5a'])) {
        $puntuacion += $datos['Sue5a']; // No poder conciliar sueño
    }
    
    // Componente 3: Duración del sueño (Sue4)
    if (isset($datos['Sue4'])) {
        if ($datos['Sue4'] > 7) $puntuacion += 1;
        elseif ($datos['Sue4'] >= 6) $puntuacion += 2;
        elseif ($datos['Sue4'] >= 5) $puntuacion += 3;
        else $puntuacion += 4;
    }
    
    // Componente 4: Eficiencia del sueño (Sue4 / (Sue3 - Sue1) * 100)
    // Simplificado
    
    // Componente 5: Perturbaciones del sueño (Sue5b a Sue5j)
    $perturbaciones = 0;
    for ($i = 'b'; $i <= 'j'; $i++) {
        $campo = 'Sue5' . $i;
        if (isset($datos[$campo]) && $datos[$campo] > 0) {
            $perturbaciones += $datos[$campo];
        }
    }
    $puntuacion += $perturbaciones;
    
    // Componente 6: Uso de medicación (Sue7)
    if (isset($datos['Sue7'])) {
        $puntuacion += $datos['Sue7'];
    }
    
    // Componente 7: Disfunción diurna (Sue8 + Sue9)
    if (isset($datos['Sue8'])) {
        $puntuacion += $datos['Sue8'];
    }
    if (isset($datos['Sue9'])) {
        $puntuacion += $datos['Sue9'];
    }
    
    return $puntuacion;
}

/**
 * Puntuación sueño vs IMC
 */
public function getSuenoIMC()
{
    try {
        $sql = "SELECT 
                    s.*,
                    a.Ant3 as valor_imc,
                    a.Ant4 as clasificacion_imc
                FROM sueno s
                INNER JOIN antropometrico a ON s.cod_participante = a.cod_participante
                WHERE a.Ant3 IS NOT NULL";
        
        $stmt = $this->db->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $datosFormateados = [];
        foreach ($resultados as $row) {
            $puntuacion = $this->calcularPuntuacionSueno($row);
            
            $datosFormateados[] = [
                'puntuacion_sueno' => $puntuacion,
                'valor_imc' => $row['valor_imc'],
                'clasificacion_imc' => $row['clasificacion_imc']
            ];
        }
        
        return $datosFormateados;
    } catch (PDOException $e) {
        error_log("Error en getSuenoIMC: " . $e->getMessage());
        return [];
    }
}

/**
 * Puntuación sueño vs ICA
 */
public function getSuenoICA()
{
    try {
        $sql = "SELECT 
                    s.*,
                    a.Ant8 as valor_ica,
                    a.Ant4 as clasificacion_imc
                FROM sueno s
                INNER JOIN antropometrico a ON s.cod_participante = a.cod_participante
                WHERE a.Ant8 IS NOT NULL";
        
        $stmt = $this->db->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $datosFormateados = [];
        foreach ($resultados as $row) {
            $puntuacion = $this->calcularPuntuacionSueno($row);
            
            $datosFormateados[] = [
                'puntuacion_sueno' => $puntuacion,
                'valor_ica' => $row['valor_ica'],
                'clasificacion_imc' => $row['clasificacion_imc']
            ];
        }
        
        return $datosFormateados;
    } catch (PDOException $e) {
        error_log("Error en getSuenoICA: " . $e->getMessage());
        return [];
    }
}

/**
 * Puntuación sueño vs ICC
 */
public function getSuenoICC()
{
    try {
        $sql = "SELECT 
                    s.*,
                    a.Ant7 as valor_icc,
                    a.Ant4 as clasificacion_imc
                FROM sueno s
                INNER JOIN antropometrico a ON s.cod_participante = a.cod_participante
                WHERE a.Ant7 IS NOT NULL";
        
        $stmt = $this->db->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $datosFormateados = [];
        foreach ($resultados as $row) {
            $puntuacion = $this->calcularPuntuacionSueno($row);
            
            $datosFormateados[] = [
                'puntuacion_sueno' => $puntuacion,
                'valor_icc' => $row['valor_icc'],
                'clasificacion_imc' => $row['clasificacion_imc']
            ];
        }
        
        return $datosFormateados;
    } catch (PDOException $e) {
        error_log("Error en getSuenoICC: " . $e->getMessage());
        return [];
    }
}

/**
 * Puntuación sueño vs Grasa corporal total
 */
public function getSuenoGrasaCorporal()
{
    try {
        $sql = "SELECT 
                    s.*,
                    a.Ant13 as grasa_corporal,
                    a.Ant4 as clasificacion_imc
                FROM sueno s
                INNER JOIN antropometrico a ON s.cod_participante = a.cod_participante
                WHERE a.Ant13 IS NOT NULL";
        
        $stmt = $this->db->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $datosFormateados = [];
        foreach ($resultados as $row) {
            $puntuacion = $this->calcularPuntuacionSueno($row);
            
            $datosFormateados[] = [
                'puntuacion_sueno' => $puntuacion,
                'grasa_corporal' => $row['grasa_corporal'],
                'clasificacion_imc' => $row['clasificacion_imc']
            ];
        }
        
        return $datosFormateados;
    } catch (PDOException $e) {
        error_log("Error en getSuenoGrasaCorporal: " . $e->getMessage());
        return [];
    }
}

/**
 * Puntuación sueño vs Masa muscular total
 */
public function getSuenoMasaMuscular()
{
    try {
        $sql = "SELECT 
                    s.*,
                    a.Ant12 as masa_muscular,
                    a.Ant4 as clasificacion_imc
                FROM sueno s
                INNER JOIN antropometrico a ON s.cod_participante = a.cod_participante
                WHERE a.Ant12 IS NOT NULL";
        
        $stmt = $this->db->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $datosFormateados = [];
        foreach ($resultados as $row) {
            $puntuacion = $this->calcularPuntuacionSueno($row);
            
            $datosFormateados[] = [
                'puntuacion_sueno' => $puntuacion,
                'masa_muscular' => $row['masa_muscular'],
                'clasificacion_imc' => $row['clasificacion_imc']
            ];
        }
        
        return $datosFormateados;
    } catch (PDOException $e) {
        error_log("Error en getSuenoMasaMuscular: " . $e->getMessage());
        return [];
    }
}

/**
 * Dieta mediterránea vs Actividad física
 */
public function getDietaActividadFisica()
{
    try {
        $sql = "SELECT 
                    al.Ali1, al.Ali2, al.Ali3, al.Ali4, al.Ali5, al.Ali6,
                    al.Ali7, al.Ali8, al.Ali9, al.Ali10, al.Ali11, al.Ali12,
                    al.Ali13, al.Ali14,
                    ac.AcF1, ac.AcF2, ac.AcF3, ac.AcF4, ac.AcF5, ac.AcF6,
                    a.Ant4 as clasificacion_imc
                FROM alimentacion al
                INNER JOIN actividad ac ON al.cod_participante = ac.cod_participante
                INNER JOIN antropometrico a ON al.cod_participante = a.cod_participante";
        
        $stmt = $this->db->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $datosFormateados = [];
        foreach ($resultados as $row) {
            $puntuacionDieta = $row['Ali1'] + $row['Ali2'] + $row['Ali3'] + $row['Ali4'] + 
                              $row['Ali5'] + $row['Ali6'] + $row['Ali7'] + $row['Ali8'] + 
                              $row['Ali9'] + $row['Ali10'] + $row['Ali11'] + $row['Ali12'] + 
                              $row['Ali13'] + $row['Ali14'];
            $puntuacionActividad = $this->calcularPuntuacionActividadFisica($row);
            
            $datosFormateados[] = [
                'puntuacion_dieta' => $puntuacionDieta,
                'puntuacion_actividad' => $puntuacionActividad,
                'clasificacion_imc' => $row['clasificacion_imc']
            ];
        }
        
        return $datosFormateados;
    } catch (PDOException $e) {
        error_log("Error en getDietaActividadFisica: " . $e->getMessage());
        return [];
    }
}

/**
 * Dieta mediterránea vs Sueño
 */
public function getDietaSueno()
{
    try {
        $sql = "SELECT 
                    al.Ali1, al.Ali2, al.Ali3, al.Ali4, al.Ali5, al.Ali6,
                    al.Ali7, al.Ali8, al.Ali9, al.Ali10, al.Ali11, al.Ali12,
                    al.Ali13, al.Ali14,
                    s.*,
                    a.Ant4 as clasificacion_imc
                FROM alimentacion al
                INNER JOIN sueno s ON al.cod_participante = s.cod_participante
                INNER JOIN antropometrico a ON al.cod_participante = a.cod_participante";
        
        $stmt = $this->db->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $datosFormateados = [];
        foreach ($resultados as $row) {
            $puntuacionDieta = $row['Ali1'] + $row['Ali2'] + $row['Ali3'] + $row['Ali4'] + 
                              $row['Ali5'] + $row['Ali6'] + $row['Ali7'] + $row['Ali8'] + 
                              $row['Ali9'] + $row['Ali10'] + $row['Ali11'] + $row['Ali12'] + 
                              $row['Ali13'] + $row['Ali14'];
            $puntuacionSueno = $this->calcularPuntuacionSueno($row);
            
            $datosFormateados[] = [
                'puntuacion_dieta' => $puntuacionDieta,
                'puntuacion_sueno' => $puntuacionSueno,
                'clasificacion_imc' => $row['clasificacion_imc']
            ];
        }
        
        return $datosFormateados;
    } catch (PDOException $e) {
        error_log("Error en getDietaSueno: " . $e->getMessage());
        return [];
    }
}

/**
 * Sueño vs Actividad física
 */
public function getSuenoActividadFisica()
{
    try {
        $sql = "SELECT 
                    s.*,
                    ac.AcF1, ac.AcF2, ac.AcF3, ac.AcF4, ac.AcF5, ac.AcF6,
                    a.Ant4 as clasificacion_imc
                FROM sueno s
                INNER JOIN actividad ac ON s.cod_participante = ac.cod_participante
                INNER JOIN antropometrico a ON s.cod_participante = a.cod_participante";
        
        $stmt = $this->db->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $datosFormateados = [];
        foreach ($resultados as $row) {
            $puntuacionSueno = $this->calcularPuntuacionSueno($row);
            $puntuacionActividad = $this->calcularPuntuacionActividadFisica($row);
            
            $datosFormateados[] = [
                'puntuacion_sueno' => $puntuacionSueno,
                'puntuacion_actividad' => $puntuacionActividad,
                'clasificacion_imc' => $row['clasificacion_imc']
            ];
        }
        
        return $datosFormateados;
    } catch (PDOException $e) {
        error_log("Error en getSuenoActividadFisica: " . $e->getMessage());
        return [];
    }
}

/**
 * ICC vs Frecuencia cardíaca (equivalente a tensión arterial)
 */
public function getICCFrecuenciaCardiaca()
{
    try {
        $sql = "SELECT 
                    a.Ant7 as valor_icc,
                    a.Ant20 as frecuencia_cardiaca,
                    a.Ant4 as clasificacion_imc,
                    p.sexo
                FROM antropometrico a
                INNER JOIN participante p ON a.cod_participante = p.cod_participante
                WHERE a.Ant7 IS NOT NULL AND a.Ant20 IS NOT NULL";
        
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error en getICCFrecuenciaCardiaca: " . $e->getMessage());
        return [];
    }
}

/**
 * ICA vs Frecuencia cardíaca
 */
public function getICAFrecuenciaCardiaca()
{
    try {
        $sql = "SELECT 
                    a.Ant8 as valor_ica,
                    a.Ant20 as frecuencia_cardiaca,
                    a.Ant4 as clasificacion_imc
                FROM antropometrico a
                WHERE a.Ant8 IS NOT NULL AND a.Ant20 IS NOT NULL";
        
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error en getICAFrecuenciaCardiaca: " . $e->getMessage());
        return [];
    }
}

/**
 * Grasa visceral vs Frecuencia cardíaca
 */
public function getGrasaVisceralFrecuenciaCardiaca()
{
    try {
        $sql = "SELECT 
                    a.Ant15 as grasa_visceral,
                    a.Ant20 as frecuencia_cardiaca,
                    a.Ant4 as clasificacion_imc
                FROM antropometrico a
                WHERE a.Ant15 IS NOT NULL AND a.Ant20 IS NOT NULL";
        
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error en getGrasaVisceralFrecuenciaCardiaca: " . $e->getMessage());
        return [];
    }
}

/**
 * Dieta mediterránea vs Frecuencia cardíaca
 */
public function getDietaFrecuenciaCardiaca()
{
    try {
        $sql = "SELECT 
                    (al.Ali1 + al.Ali2 + al.Ali3 + al.Ali4 + al.Ali5 + al.Ali6 + 
                     al.Ali7 + al.Ali8 + al.Ali9 + al.Ali10 + al.Ali11 + al.Ali12 + 
                     al.Ali13 + al.Ali14) as puntuacion_dieta,
                    a.Ant20 as frecuencia_cardiaca,
                    a.Ant4 as clasificacion_imc
                FROM alimentacion al
                INNER JOIN antropometrico a ON al.cod_participante = a.cod_participante
                WHERE a.Ant20 IS NOT NULL
                ORDER BY puntuacion_dieta";
        
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error en getDietaFrecuenciaCardiaca: " . $e->getMessage());
        return [];
    }
}

/**
 * Actividad física vs Frecuencia cardíaca
 */
public function getActividadFisicaFrecuenciaCardiaca()
{
    try {
        $sql = "SELECT 
                    ac.AcF1, ac.AcF2, ac.AcF3, ac.AcF4, ac.AcF5, ac.AcF6,
                    a.Ant20 as frecuencia_cardiaca,
                    a.Ant4 as clasificacion_imc
                FROM actividad ac
                INNER JOIN antropometrico a ON ac.cod_participante = a.cod_participante
                WHERE a.Ant20 IS NOT NULL";
        
        $stmt = $this->db->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $datosFormateados = [];
        foreach ($resultados as $row) {
            $puntuacion = $this->calcularPuntuacionActividadFisica($row);
            
            $datosFormateados[] = [
                'puntuacion_actividad' => $puntuacion,
                'frecuencia_cardiaca' => $row['frecuencia_cardiaca'],
                'clasificacion_imc' => $row['clasificacion_imc']
            ];
        }
        
        return $datosFormateados;
    } catch (PDOException $e) {
        error_log("Error en getActividadFisicaFrecuenciaCardiaca: " . $e->getMessage());
        return [];
    }
}

/**
 * Sueño vs Frecuencia cardíaca
 */
public function getSuenoFrecuenciaCardiaca()
{
    try {
        $sql = "SELECT 
                    s.*,
                    a.Ant20 as frecuencia_cardiaca,
                    a.Ant4 as clasificacion_imc
                FROM sueno s
                INNER JOIN antropometrico a ON s.cod_participante = a.cod_participante
                WHERE a.Ant20 IS NOT NULL";
        
        $stmt = $this->db->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $datosFormateados = [];
        foreach ($resultados as $row) {
            $puntuacion = $this->calcularPuntuacionSueno($row);
            
            $datosFormateados[] = [
                'puntuacion_sueno' => $puntuacion,
                'frecuencia_cardiaca' => $row['frecuencia_cardiaca'],
                'clasificacion_imc' => $row['clasificacion_imc']
            ];
        }
        
        return $datosFormateados;
    } catch (PDOException $e) {
        error_log("Error en getSuenoFrecuenciaCardiaca: " . $e->getMessage());
        return [];
    }
}
}
?>