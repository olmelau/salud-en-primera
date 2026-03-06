<?php
require_once '../app/models/analisisModel.php';


class analisisController
{
    public function imprimirAnalisis()
    {
        session_start();
        
        $cod_participante = $_SESSION['cod_participante']; //Lo pasamos a una variable para evitar errores posteriormente con el tipo de datos y mejor control de errores.

        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
            // Siempre comprobamos que la session se ha iniciado a traves del login, y no se ha llegado aquí directamente. (Ha pasado por el switch adecuadamente.)
            header('Location: index.php?controller=home&action=home');
            exit();
        }

        $modelo = new analisisModel();
        
        
        require_once '../app/views/AnalisisView.php'; //En el caso del analisis, llamamos ya a la vista, y esta imprimirá el titulo y tendrá los metodos correspondientes a cada formulario.

        if ($modelo->formSuenoCompletado($cod_participante)){ //Primero se mira si ya ha completado el formulario el participante actual.
            $datosSueno = $modelo->recogerDatosSueno($cod_participante); //En caso de que si, sacaremos en un array los datos que tiene ese participante en el formulario.
            imprimirAnalisisSueno($datosSueno); //Llamamos al metodo de la vista que imprime en base a ese array. En la parte de Jose Manuel esto es lo que se hace con API.
            //La parte de los analisis trabajados especificamente corresponden a la parte de Jose Manuel con Java Script.
        }

        //Los mismos comentarios del primer IF, aplican a los siguientes.
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