<?php
function mostrarAnalisisCompleto($datosGraficas, $datosParticipante, $cod_participante) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../frontend/js/d3.v7.min.js"></script>
    <script src="../frontend/js/graficasGenerales.js" defer></script>
    <link rel="stylesheet" href="../frontend/css/style.css">
    <title>Análisis Completo de Salud</title>
    <style>

    grafica-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        justify-content: space-around;
        padding-right: 5%;
        padding-left: 5%;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
    }

    .grafica-wrapper {
        width: 100%;
    }

    .grafica-wrapper svg {
        width: 100%;
        height: auto;
    }

    .seccion-titulo h2 {
        font-size: 1.5em;
        color: var(--texto-principal);
    }

    .no-datos {
        text-align: center;
        padding: 20px;
        color: var(--boton-sin-completar);
        font-family: var(--fuente-principal);
    }

    button{
        padding-left: 10vh;
        padding-right: 10vh;
        padding-top: 5%;
        padding-bottom: 5%;
        border-radius: 3vh; 
        border: 2px grey solid;
        font-weight: bold;
        background-color: rgb(177, 213, 247);
    }

    button:hover{
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        background-color: rgb(123, 189, 252);
    }
    </style>
</head>
<body>
    <div class="container">
        <!-- Cabecera -->
        <div class="header">
            <h1>📊 Análisis Integral de Salud</h1>
        </div>
        
        <form action="index.php?controller=admin&action=mostrarPaginaAdmin" method="post">
            <button type="submit">Volver Atras</button>
        </form>
        
        <!-- ============================================ -->
        <!-- SECCIÓN 1: RIESGO CARDIOMETABÓLICO Y CARDIOVASCULAR -->
        <!-- ============================================ -->

        <div class="seccion-titulo">
            <h2>🔴 Riesgo Cardiometabólico y Cardiovascular</h2>
        </div>

        <!-- 5. Familia profesional vs ICA -->
        <div class="grafica-container">
            <h2>
                5. Familia Profesional vs Índice Cintura-Altura (ICA)
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-familia-ica"></div>
            </div>
        </div>

        <!-- 6. Centro educativo vs ICA -->
        <div class="grafica-container">
            <h2>
                6. Riesgo Cardiometabólico: Centro Educativo vs ICA
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-centro-ica"></div>
            </div>
        </div>

        <!-- 7. Sexo vs ICC -->
        <div class="grafica-container">
            <h2>
                7. Sexo vs Índice Cintura-Cadera (ICC)
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-sexo-icc"></div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- SECCIÓN 2: COMPOSICIÓN CORPORAL -->
        <!-- ============================================ -->
        <div class="seccion-titulo">
            <h2>💪 Composición Corporal y Hábitos Alimenticios</h2>
        </div>

        <!-- 8. Grasa corporal vs IMC -->
        <div class="grafica-container">
            <h2>
                8. Grasa Corporal Total vs IMC
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-grasa-imc"></div>
            </div>
        </div>

        <!-- 9. Dieta Mediterránea vs IMC -->
        <div class="grafica-container">
            <h2>
                9. Adherencia a la Dieta Mediterránea vs IMC
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-dieta-imc"></div>
            </div>
        </div>

        <!-- 10. Dieta mediterránea vs Grasa corporal -->
        <div class="grafica-container">
            <h2>
                10. Dieta Mediterránea vs Grasa Corporal Total
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-dieta-grasa"></div>
            </div>
        </div>

        <!-- 11. Dieta mediterránea vs Masa muscular -->
        <div class="grafica-container">
            <h2>
                11. Dieta Mediterránea vs Masa Muscular Total
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-dieta-muscular"></div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- SECCIÓN 3: ACTIVIDAD FÍSICA -->
        <!-- ============================================ -->
        <div class="seccion-titulo">
            <h2>🏃 Actividad Física y su Relación con Indicadores de Salud</h2>
        </div>

        <!-- 12. Actividad física vs IMC -->
        <div class="grafica-container">
            <h2>
                12. Actividad Física (IPAQ) vs IMC
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-actividad-imc"></div>
            </div>
        </div>

        <!-- 13. Actividad física vs ICA -->
        <div class="grafica-container">
            <h2>
                13. Actividad Física vs Índice Cintura-Altura (ICA)
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-actividad-ica"></div>
            </div>
        </div>

        <!-- 14. Actividad física vs ICC -->
        <div class="grafica-container">
            <h2>
                14. Actividad Física vs Índice Cintura-Cadera (ICC)
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-actividad-icc"></div>
            </div>
        </div>

        <!-- 15. Actividad física vs Grasa corporal -->
        <div class="grafica-container">
            <h2>
                15. Actividad Física vs Grasa Corporal Total
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-actividad-grasa"></div>
            </div>
        </div>

        <!-- 16. Actividad física vs Masa muscular -->
        <div class="grafica-container">
            <h2>
                16. Actividad Física vs Masa Muscular Total
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-actividad-muscular"></div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- SECCIÓN 4: CALIDAD DEL SUEÑO -->
        <!-- ============================================ -->
        <div class="seccion-titulo">
            <h2>😴 Calidad del Sueño y su Impacto en la Salud</h2>
        </div>

        <!-- 17. Sueño vs IMC -->
        <div class="grafica-container">
            <h2>
                17. Calidad del Sueño (PSQI) vs IMC
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-sueno-imc"></div>
            </div>
        </div>

        <!-- 18. Sueño vs ICA -->
        <div class="grafica-container">
            <h2>
                18. Calidad del Sueño vs Índice Cintura-Altura (ICA)
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-sueno-ica"></div>
            </div>
        </div>

        <!-- 19. Sueño vs ICC -->
        <div class="grafica-container">
            <h2>
                19. Calidad del Sueño vs Índice Cintura-Cadera (ICC)
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-sueno-icc"></div>
            </div>
        </div>

        <!-- 20. Sueño vs Grasa corporal -->
        <div class="grafica-container">
            <h2>
                20. Calidad del Sueño vs Grasa Corporal Total
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-sueno-grasa"></div>
            </div>
        </div>

        <!-- 21. Sueño vs Masa muscular -->
        <div class="grafica-container">
            <h2>
                21. Calidad del Sueño vs Masa Muscular Total
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-sueno-muscular"></div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- SECCIÓN 5: RELACIONES ENTRE CUESTIONARIOS -->
        <!-- ============================================ -->
        <div class="seccion-titulo">
            <h2>🔄 Relaciones entre Hábitos de Vida</h2>
        </div>

        <!-- 22. Dieta vs Actividad física -->
        <div class="grafica-container">
            <h2>
                22. Dieta Mediterránea vs Actividad Física
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-dieta-actividad"></div>
            </div>
        </div>

        <!-- 23. Dieta vs Sueño -->
        <div class="grafica-container">
            <h2>
                23. Dieta Mediterránea vs Calidad del Sueño
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-dieta-sueno"></div>
            </div>
        </div>

        <!-- 24. Sueño vs Actividad física -->
        <div class="grafica-container">
            <h2>
                24. Calidad del Sueño vs Actividad Física
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-sueno-actividad"></div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- SECCIÓN 6: FRECUENCIA CARDÍACA (Equivalente a Tensión Arterial) -->
        <!-- ============================================ -->
        <div class="seccion-titulo">
            <h2>❤️ Indicadores de Riesgo Cardiovascular (Frecuencia Cardíaca en Reposo)</h2>
        </div>

        <!-- 25. ICC vs Frecuencia cardíaca -->
        <div class="grafica-container">
            <h2>
                25. ICC vs Frecuencia Cardíaca en Reposo
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-icc-frecuencia"></div>
            </div>
        </div>

        <!-- 26. ICA vs Frecuencia cardíaca -->
        <div class="grafica-container">
            <h2>
                26. ICA vs Frecuencia Cardíaca en Reposo
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-ica-frecuencia"></div>
            </div>
        </div>

        <!-- 27. Grasa visceral vs Frecuencia cardíaca -->
        <div class="grafica-container">
            <h2>
                27. Grasa Visceral vs Frecuencia Cardíaca en Reposo
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-visceral-frecuencia"></div>
            </div>
        </div>

        <!-- 28. Dieta vs Frecuencia cardíaca -->
        <div class="grafica-container">
            <h2>
                28. Dieta Mediterránea vs Frecuencia Cardíaca en Reposo
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-dieta-frecuencia"></div>
            </div>
        </div>

        <!-- 29. Actividad física vs Frecuencia cardíaca -->
        <div class="grafica-container">
            <h2>
                29. Actividad Física vs Frecuencia Cardíaca en Reposo
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-actividad-frecuencia"></div>
            </div>
        </div>

        <!-- 30. Sueño vs Frecuencia cardíaca -->
        <div class="grafica-container">
            <h2>
                30. Calidad del Sueño vs Frecuencia Cardíaca en Reposo
            </h2>
            <div class="grafica-wrapper">
                <div id="grafica-sueno-frecuencia"></div>
            </div>
        </div>
    </div>

    <script>
        // Pasar datos de PHP a JavaScript
        const datosGraficas = <?php echo json_encode($datosGraficas); ?>;
        
        console.log('Datos recibidos para todas las gráficas:', datosGraficas);
        
        // Función para esperar a que D3 esté cargado
        function esperarD3(callback) {
            if (typeof d3 !== 'undefined') {
                callback();
            } else {
                console.log('Esperando a que D3 se cargue...');
                setTimeout(() => esperarD3(callback), 100);
            }
        }
        
        // Función helper para mostrar mensaje cuando no hay datos
        function mostrarNoDatos(contenedorId) {
            const elemento = document.getElementById(contenedorId);
            if (elemento) {
                elemento.innerHTML = '<div class="no-datos">⚠️ No hay datos suficientes para generar esta gráfica</div>';
            }
        }
        
        // Inicializar todas las gráficas cuando el DOM esté listo
        document.addEventListener('DOMContentLoaded', function() {
            esperarD3(function() {
                console.log('D3 cargado correctamente. Iniciando creación de gráficas...');
                
                // ===== SECCIÓN 1: RIESGO CARDIOMETABÓLICO =====
                
                // 5. Familia profesional vs ICA
                if (datosGraficas.familia_ica && datosGraficas.familia_ica.length > 0) {
                    crearGraficaCategorica('grafica-familia-ica', datosGraficas.familia_ica, 
                        'categoria', 'clasificacion_riesgo', 'valor_ica',
                        'Riesgo Cardiometabólico por Familia Profesional', 
                        'Familia Profesional', 'ICA Promedio', 'histograma');
                } else mostrarNoDatos('grafica-familia-ica');
                
                // 6. Centro educativo vs ICA
                if (datosGraficas.centro_ica && datosGraficas.centro_ica.length > 0) {
                    crearGraficaCategorica('grafica-centro-ica', datosGraficas.centro_ica,
                        'categoria', 'clasificacion_riesgo', 'valor_ica',
                        'Riesgo Cardiometabólico por Centro Educativo',
                        'Centro Educativo', 'ICA Promedio', 'histograma');
                } else mostrarNoDatos('grafica-centro-ica');
                
                // 7. Sexo vs ICC
                if (datosGraficas.sexo_icc && datosGraficas.sexo_icc.length > 0) {
                    crearGraficaCategorica('grafica-sexo-icc', datosGraficas.sexo_icc,
                        'categoria', 'clasificacion_riesgo', 'valor_icc',
                        'Riesgo Cardiovascular por Sexo', 'Sexo', 'ICC Promedio', 'histograma');
                } else mostrarNoDatos('grafica-sexo-icc');
                
                // ===== SECCIÓN 2: COMPOSICIÓN CORPORAL =====
                
                // 8. Grasa corporal vs IMC
                if (datosGraficas.grasa_imc && datosGraficas.grasa_imc.length > 0) {
                    crearGraficaDispersion('grafica-grasa-imc', datosGraficas.grasa_imc,
                        'sexo', 'valor_imc', 'clasificacion_imc',
                        'Grasa Corporal Total vs IMC', 'Sexo', 'IMC (kg/m²)');
                } else mostrarNoDatos('grafica-grasa-imc');
                
                // 9. Dieta Mediterránea vs IMC
                if (datosGraficas.dieta_imc && datosGraficas.dieta_imc.length > 0) {
                    crearGraficaDispersion('grafica-dieta-imc', datosGraficas.dieta_imc,
                        'clasificacion_imc', 'valor_imc', 'clasificacion_imc',
                        'Dieta Mediterránea vs IMC', 'Clasificación IMC', 'IMC (kg/m²)');
                } else mostrarNoDatos('grafica-dieta-imc');
                
                // 10. Dieta vs Grasa corporal
                if (datosGraficas.dieta_grasa && datosGraficas.dieta_grasa.length > 0) {
                    crearGraficaDispersion('grafica-dieta-grasa', datosGraficas.dieta_grasa,
                        'clasificacion_imc', 'grasa_corporal', 'clasificacion_imc',
                        'Dieta Mediterránea vs Grasa Corporal', 'Clasificación IMC', 'Grasa Corporal Total (%)');
                } else mostrarNoDatos('grafica-dieta-grasa');
                
                // 11. Dieta vs Masa muscular
                if (datosGraficas.dieta_muscular && datosGraficas.dieta_muscular.length > 0) {
                    crearGraficaDispersion('grafica-dieta-muscular', datosGraficas.dieta_muscular,
                        'clasificacion_imc', 'masa_muscular', 'clasificacion_imc',
                        'Dieta Mediterránea vs Masa Muscular', 'Clasificación IMC', 'Masa Muscular Total (%/Kg)');
                } else mostrarNoDatos('grafica-dieta-muscular');
                
                // ===== SECCIÓN 3: ACTIVIDAD FÍSICA =====
                
                // 12. Actividad física vs IMC
                if (datosGraficas.actividad_imc && datosGraficas.actividad_imc.length > 0) {
                    crearGraficaDispersion('grafica-actividad-imc', datosGraficas.actividad_imc,
                        'nivel_actividad', 'valor_imc', 'clasificacion_imc',
                        'Actividad Física (IPAQ) vs IMC', 'Nivel de Actividad Física', 'IMC (kg/m²)');
                } else mostrarNoDatos('grafica-actividad-imc');
                
                // 13. Actividad física vs ICA
                if (datosGraficas.actividad_ica && datosGraficas.actividad_ica.length > 0) {
                    crearGraficaDispersion('grafica-actividad-ica', datosGraficas.actividad_ica,
                        'nivel_actividad', 'valor_ica', 'clasificacion_imc',
                        'Actividad Física vs ICA', 'Nivel de Actividad Física', 'ICA');
                } else mostrarNoDatos('grafica-actividad-ica');
                
                // 14. Actividad física vs ICC
                if (datosGraficas.actividad_icc && datosGraficas.actividad_icc.length > 0) {
                    crearGraficaDispersion('grafica-actividad-icc', datosGraficas.actividad_icc,
                        'nivel_actividad', 'valor_icc', 'clasificacion_imc',
                        'Actividad Física vs ICC', 'Nivel de Actividad Física', 'ICC');
                } else mostrarNoDatos('grafica-actividad-icc');
                
                // 15. Actividad física vs Grasa corporal
                if (datosGraficas.actividad_grasa && datosGraficas.actividad_grasa.length > 0) {
                    crearGraficaDispersion('grafica-actividad-grasa', datosGraficas.actividad_grasa,
                        'nivel_actividad', 'grasa_corporal', 'clasificacion_imc',
                        'Actividad Física vs Grasa Corporal', 'Nivel de Actividad Física', 'Grasa Corporal Total (%)');
                } else mostrarNoDatos('grafica-actividad-grasa');
                
                // 16. Actividad física vs Masa muscular
                if (datosGraficas.actividad_muscular && datosGraficas.actividad_muscular.length > 0) {
                    crearGraficaDispersion('grafica-actividad-muscular', datosGraficas.actividad_muscular,
                        'nivel_actividad', 'masa_muscular', 'clasificacion_imc',
                        'Actividad Física vs Masa Muscular', 'Nivel de Actividad Física', 'Masa Muscular Total (%/Kg)');
                } else mostrarNoDatos('grafica-actividad-muscular');
                
                // ===== SECCIÓN 4: CALIDAD DEL SUEÑO =====
                
                // 17. Sueño vs IMC
                if (datosGraficas.sueno_imc && datosGraficas.sueno_imc.length > 0) {
                    crearGraficaDispersion('grafica-sueno-imc', datosGraficas.sueno_imc,
                        'clasificacion_imc', 'valor_imc', 'clasificacion_imc',
                        'Calidad del Sueño (PSQI) vs IMC', 'Clasificación IMC', 'IMC (kg/m²)');
                } else mostrarNoDatos('grafica-sueno-imc');
                
                // 18. Sueño vs ICA
                if (datosGraficas.sueno_ica && datosGraficas.sueno_ica.length > 0) {
                    crearGraficaDispersion('grafica-sueno-ica', datosGraficas.sueno_ica,
                        'clasificacion_imc', 'valor_ica', 'clasificacion_imc',
                        'Calidad del Sueño vs ICA', 'Clasificación IMC', 'ICA');
                } else mostrarNoDatos('grafica-sueno-ica');
                
                // 19. Sueño vs ICC
                if (datosGraficas.sueno_icc && datosGraficas.sueno_icc.length > 0) {
                    crearGraficaDispersion('grafica-sueno-icc', datosGraficas.sueno_icc,
                        'clasificacion_imc', 'valor_icc', 'clasificacion_imc',
                        'Calidad del Sueño vs ICC', 'Clasificación IMC', 'ICC');
                } else mostrarNoDatos('grafica-sueno-icc');
                
                // 20. Sueño vs Grasa corporal
                if (datosGraficas.sueno_grasa && datosGraficas.sueno_grasa.length > 0) {
                    crearGraficaDispersion('grafica-sueno-grasa', datosGraficas.sueno_grasa,
                        'clasificacion_imc', 'grasa_corporal', 'clasificacion_imc',
                        'Calidad del Sueño vs Grasa Corporal', 'Clasificación IMC', 'Grasa Corporal Total (%)');
                } else mostrarNoDatos('grafica-sueno-grasa');
                
                // 21. Sueño vs Masa muscular
                if (datosGraficas.sueno_muscular && datosGraficas.sueno_muscular.length > 0) {
                    crearGraficaDispersion('grafica-sueno-muscular', datosGraficas.sueno_muscular,
                        'clasificacion_imc', 'masa_muscular', 'clasificacion_imc',
                        'Calidad del Sueño vs Masa Muscular', 'Clasificación IMC', 'Masa Muscular Total (%/Kg)');
                } else mostrarNoDatos('grafica-sueno-muscular');
                
                // ===== SECCIÓN 5: RELACIONES ENTRE CUESTIONARIOS =====
                
                // 22. Dieta vs Actividad física
                if (datosGraficas.dieta_actividad && datosGraficas.dieta_actividad.length > 0) {
                    crearGraficaDispersion('grafica-dieta-actividad', datosGraficas.dieta_actividad,
                        'clasificacion_imc', 'puntuacion_actividad', 'clasificacion_imc',
                        'Dieta Mediterránea vs Actividad Física', 'Clasificación IMC', 'Puntuación Actividad Física');
                } else mostrarNoDatos('grafica-dieta-actividad');
                
                // 23. Dieta vs Sueño
                if (datosGraficas.dieta_sueno && datosGraficas.dieta_sueno.length > 0) {
                    crearGraficaDispersion('grafica-dieta-sueno', datosGraficas.dieta_sueno,
                        'clasificacion_imc', 'puntuacion_sueno', 'clasificacion_imc',
                        'Dieta Mediterránea vs Calidad del Sueño', 'Clasificación IMC', 'Puntuación Calidad Sueño');
                } else mostrarNoDatos('grafica-dieta-sueno');
                
                // 24. Sueño vs Actividad física
                if (datosGraficas.sueno_actividad && datosGraficas.sueno_actividad.length > 0) {
                    crearGraficaDispersion('grafica-sueno-actividad', datosGraficas.sueno_actividad,
                        'clasificacion_imc', 'puntuacion_actividad', 'clasificacion_imc',
                        'Calidad del Sueño vs Actividad Física', 'Clasificación IMC', 'Puntuación Actividad Física');
                } else mostrarNoDatos('grafica-sueno-actividad');
                
                // ===== SECCIÓN 6: FRECUENCIA CARDÍACA =====
                
                // 25. ICC vs Frecuencia cardíaca
                if (datosGraficas.icc_frecuencia && datosGraficas.icc_frecuencia.length > 0) {
                    crearGraficaDispersion('grafica-icc-frecuencia', datosGraficas.icc_frecuencia,
                        'sexo', 'frecuencia_cardiaca', 'clasificacion_imc',
                        'ICC vs Frecuencia Cardíaca en Reposo', 'Sexo', 'Frecuencia Cardíaca (lpm)');
                } else mostrarNoDatos('grafica-icc-frecuencia');
                
                // 26. ICA vs Frecuencia cardíaca
                if (datosGraficas.ica_frecuencia && datosGraficas.ica_frecuencia.length > 0) {
                    crearGraficaDispersion('grafica-ica-frecuencia', datosGraficas.ica_frecuencia,
                        'clasificacion_imc', 'frecuencia_cardiaca', 'clasificacion_imc',
                        'ICA vs Frecuencia Cardíaca en Reposo', 'Clasificación IMC', 'Frecuencia Cardíaca (lpm)');
                } else mostrarNoDatos('grafica-ica-frecuencia');
                
                // 27. Grasa visceral vs Frecuencia cardíaca
                if (datosGraficas.visceral_frecuencia && datosGraficas.visceral_frecuencia.length > 0) {
                    crearGraficaDispersion('grafica-visceral-frecuencia', datosGraficas.visceral_frecuencia,
                        'clasificacion_imc', 'frecuencia_cardiaca', 'clasificacion_imc',
                        'Grasa Visceral vs Frecuencia Cardíaca', 'Clasificación IMC', 'Frecuencia Cardíaca (lpm)');
                } else mostrarNoDatos('grafica-visceral-frecuencia');
                
                // 28. Dieta vs Frecuencia cardíaca
                if (datosGraficas.dieta_frecuencia && datosGraficas.dieta_frecuencia.length > 0) {
                    crearGraficaDispersion('grafica-dieta-frecuencia', datosGraficas.dieta_frecuencia,
                        'clasificacion_imc', 'frecuencia_cardiaca', 'clasificacion_imc',
                        'Dieta Mediterránea vs Frecuencia Cardíaca', 'Clasificación IMC', 'Frecuencia Cardíaca (lpm)');
                } else mostrarNoDatos('grafica-dieta-frecuencia');
                
                // 29. Actividad física vs Frecuencia cardíaca
                if (datosGraficas.actividad_frecuencia && datosGraficas.actividad_frecuencia.length > 0) {
                    crearGraficaDispersion('grafica-actividad-frecuencia', datosGraficas.actividad_frecuencia,
                        'clasificacion_imc', 'frecuencia_cardiaca', 'clasificacion_imc',
                        'Actividad Física vs Frecuencia Cardíaca', 'Clasificación IMC', 'Frecuencia Cardíaca (lpm)');
                } else mostrarNoDatos('grafica-actividad-frecuencia');
                
                // 30. Sueño vs Frecuencia cardíaca
                if (datosGraficas.sueno_frecuencia && datosGraficas.sueno_frecuencia.length > 0) {
                    crearGraficaDispersion('grafica-sueno-frecuencia', datosGraficas.sueno_frecuencia,
                        'clasificacion_imc', 'frecuencia_cardiaca', 'clasificacion_imc',
                        'Calidad del Sueño vs Frecuencia Cardíaca', 'Clasificación IMC', 'Frecuencia Cardíaca (lpm)');
                } else mostrarNoDatos('grafica-sueno-frecuencia');
                
                console.log('✅ Todas las gráficas han sido procesadas');
            });
        });
    </script>
</body>
</html>
<?php
}
?>