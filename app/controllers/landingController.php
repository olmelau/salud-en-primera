<?php

session_start();
require_once '../app/models/analisisModel.php';

/**
 * La lógica de landingController es simplemente imprimir la vista sin acceso a la web.
 * Y dentro de esa vista están las gráficas visibles para todos y un boton que llevará al Login 
 */
class landingController
{

    public function landing()
    {
       
        $modelo = new analisisModel();
        
        // Solo las 4 primeras gráficas
        $datosGraficas = [];
        
        // 1. Familia profesional vs Clasificación IMC (Histograma)
        $datosGraficas['familia_imc'] = $modelo->getFamiliaProfesionalPorIMC();
        
        // 2. Sexo vs Clasificación IMC (Histograma)
        $datosGraficas['sexo_imc'] = $modelo->getSexoPorIMC();
        
        // 3. Centro educativo vs Clasificación IMC (Histograma)
        $datosGraficas['centro_imc'] = $modelo->getCentroEducativoPorIMC();
        
        // 4. Familia profesional vs IMC (Nube de puntos)
        $datosGraficas['familia_imc_valor'] = $modelo->getFamiliaProfesionalIMCValor();
        
        // Cargar la nueva vista específica
        require_once '../app/views/GraficasIMCView.php';
        // mostrarGraficasIMC($datosGraficas);
    }

    
    
}
