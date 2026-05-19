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
    
    // Gráficas 5-9 originales
    $datosGraficas['familia_ica'] = $modelo->getFamiliaProfesionalPorICA();
    $datosGraficas['centro_ica'] = $modelo->getCentroEducativoPorICA();
    $datosGraficas['sexo_icc'] = $modelo->getSexoPorICC();
    $datosGraficas['grasa_imc'] = $modelo->getGrasaCorporalIMC();
    $datosGraficas['dieta_imc'] = $modelo->getDietaMediterraneaIMC();
    
    // NUEVAS GRÁFICAS
    // Dieta mediterránea vs Grasa corporal y Masa muscular
    $datosGraficas['dieta_grasa'] = $modelo->getDietaGrasaCorporal();
    $datosGraficas['dieta_muscular'] = $modelo->getDietaMasaMuscular();
    
    // Actividad física vs varios indicadores
    $datosGraficas['actividad_imc'] = $modelo->getActividadFisicaIMC();
    $datosGraficas['actividad_ica'] = $modelo->getActividadFisicaICA();
    $datosGraficas['actividad_icc'] = $modelo->getActividadFisicaICC();
    $datosGraficas['actividad_grasa'] = $modelo->getActividadFisicaGrasaCorporal();
    $datosGraficas['actividad_muscular'] = $modelo->getActividadFisicaMasaMuscular();
    
    // Sueño vs varios indicadores
    $datosGraficas['sueno_imc'] = $modelo->getSuenoIMC();
    $datosGraficas['sueno_ica'] = $modelo->getSuenoICA();
    $datosGraficas['sueno_icc'] = $modelo->getSuenoICC();
    $datosGraficas['sueno_grasa'] = $modelo->getSuenoGrasaCorporal();
    $datosGraficas['sueno_muscular'] = $modelo->getSuenoMasaMuscular();
    
    // Relaciones entre cuestionarios
    $datosGraficas['dieta_actividad'] = $modelo->getDietaActividadFisica();
    $datosGraficas['dieta_sueno'] = $modelo->getDietaSueno();
    $datosGraficas['sueno_actividad'] = $modelo->getSuenoActividadFisica();
    
    // Frecuencia cardíaca (equivalente a tensión arterial)
    $datosGraficas['icc_frecuencia'] = $modelo->getICCFrecuenciaCardiaca();
    $datosGraficas['ica_frecuencia'] = $modelo->getICAFrecuenciaCardiaca();
    $datosGraficas['visceral_frecuencia'] = $modelo->getGrasaVisceralFrecuenciaCardiaca();
    $datosGraficas['dieta_frecuencia'] = $modelo->getDietaFrecuenciaCardiaca();
    $datosGraficas['actividad_frecuencia'] = $modelo->getActividadFisicaFrecuenciaCardiaca();
    $datosGraficas['sueno_frecuencia'] = $modelo->getSuenoFrecuenciaCardiaca();
    
    // Datos del participante actual
    $datosParticipante = null;
    if ($cod_participante) {
        $datosParticipante = [
            'sueno' => $modelo->formSuenoCompletado($cod_participante) ? $modelo->recogerDatosSueno($cod_participante) : null,
            'antopo' => $modelo->formAntopoCompletado($cod_participante) ? $modelo->recogerDatosAntopo($cod_participante) : null,
            'dieta' => $modelo->formDietaCompletado($cod_participante) ? $modelo->recogerDatosDieta($cod_participante) : null,
            'fisica' => $modelo->formFisicaCompletado($cod_participante) ? $modelo->recogerDatosFisica($cod_participante) : null
        ];
    }
    
    require_once '../app/views/AnalisisView.php';
    mostrarAnalisisCompleto($datosGraficas, $datosParticipante, $cod_participante);
}


}