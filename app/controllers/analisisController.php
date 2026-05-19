<?php
require_once '../app/models/analisisModel.php';

class analisisController
{
// En analisisController.php, método imprimirAnalisis()
    public function imprimirAnalisis()
    {
        session_start();
        
        $cod_participante = $_SESSION['cod_participante'] ?? null;

        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
            header('Location: index.php?controller=home&action=home');
            exit();
        }

        $modelo = new analisisModel();
        
        // Preparar TODOS los datos para las gráficas
        $datosGraficas = [];
        
        // Gráficas 1-4 (IMC) - Las quitamos de esta vista
        // $datosGraficas['familia_imc'] = $modelo->getFamiliaProfesionalPorIMC();
        // $datosGraficas['sexo_imc'] = $modelo->getSexoPorIMC();
        // $datosGraficas['centro_imc'] = $modelo->getCentroEducativoPorIMC();
        // $datosGraficas['familia_imc_valor'] = $modelo->getFamiliaProfesionalIMCValor();
        
        // Gráficas 5-9 (las que se muestran en esta vista)
        // 5. Familia profesional vs ICA (Riesgo cardiometabólico)
        $datosGraficas['familia_ica'] = $modelo->getFamiliaProfesionalPorICA();
        
        // 6. Centro educativo vs ICA
        $datosGraficas['centro_ica'] = $modelo->getCentroEducativoPorICA();
        
        // 7. Sexo vs ICC
        $datosGraficas['sexo_icc'] = $modelo->getSexoPorICC();
        
        // 8. Grasa corporal total vs IMC
        $datosGraficas['grasa_imc'] = $modelo->getGrasaCorporalIMC();
        
        // 9. Adherencia dieta mediterránea vs IMC
        $datosGraficas['dieta_imc'] = $modelo->getDietaMediterraneaIMC();
        
        // Datos del participante actual si existen
        $datosParticipante = null;
        if ($cod_participante) {
            $datosParticipante = [
                'sueno' => $modelo->formSuenoCompletado($cod_participante) ? $modelo->recogerDatosSueno($cod_participante) : null,
                'antopo' => $modelo->formAntopoCompletado($cod_participante) ? $modelo->recogerDatosAntopo($cod_participante) : null,
                'dieta' => $modelo->formDietaCompletado($cod_participante) ? $modelo->recogerDatosDieta($cod_participante) : null,
                'fisica' => $modelo->formFisicaCompletado($cod_participante) ? $modelo->recogerDatosFisica($cod_participante) : null
            ];
        }
        
        // Debug: Verificar datos antes de pasar a la vista
        error_log("Datos para gráficas 5-9: " . print_r($datosGraficas, true));
        
        require_once '../app/views/AnalisisView.php';
        mostrarAnalisisCompleto($datosGraficas, $datosParticipante, $cod_participante);
    }


}