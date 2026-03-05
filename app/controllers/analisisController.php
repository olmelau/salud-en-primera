<?php
require_once '../app/models/analisisModel.php';


class analisisController
{
    public function imprimirAnalisis()
    {
        session_start();
        
        $cod_participante = $_SESSION['cod_participante'];

        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
            // Si NO existe o NO es true, rediriges
            header('Location: index.php?controller=home&action=home');
            exit();
        }

        $modelo = new analisisModel();
        
        
        require_once '../app/views/AnalisisView.php';

        if ($modelo->formSuenoCompletado($cod_participante)){
            $datosSueno = $modelo->recogerDatosSueno($cod_participante);
            imprimirAnalisisSueno($datosSueno);
        }

        if ($modelo->formAntopoCompletado($cod_participante)){
            $datosAntopo = $modelo->recogerDatosAntopo($cod_participante);
            imprimirAnalisisAntopo($datosAntopo);
        }

        if ($modelo->formDietaCompletado($cod_participante)){
            $datosDieta = $modelo->recogerDatosDieta($cod_participante);
            imprimirAnalisisDieta($datosDieta);
        }

        if ($modelo->formFisicaCompletado($cod_participante)){
            $datosFisica = $modelo->recogerDatosFisica($cod_participante);
            imprimirAnalisisFisica($datosFisica);
        }
    }
    
}