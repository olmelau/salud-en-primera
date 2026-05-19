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
    <title>Análisis Completo</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📊 Análisis de Datos de Salud</h1>
        </div>
        

        <!-- Familia profesional vs ICA (Riesgo Cardiometabólico) -->
        <div class="grafica-container">
            <h2>Riesgo Cardiometabólico: Familia Profesional vs Índice Cintura-Altura (ICA)</h2>
            <p style="color: #7f8c8d; margin-bottom: 15px;">
                Distribución del ICA por familia profesional. ICA ≥ 0.5 indica riesgo cardiometabólico elevado.
            </p>
            <div class="grafica-wrapper">
                <div id="grafica-familia-ica"></div>
            </div>
        </div>

        <!-- Centro educativo vs ICA -->
        <div class="grafica-container">
            <h2>Riesgo Cardiometabólico: Centro Educativo vs ICA</h2>
            <p style="color: #7f8c8d; margin-bottom: 15px;">
                Distribución del ICA por centro educativo. Permite identificar centros con mayor riesgo cardiometabólico.
            </p>
            <div class="grafica-wrapper">
                <div id="grafica-centro-ica"></div>
            </div>
        </div>

        <!-- Sexo vs ICC (Alteraciones Cardiovasculares) -->
        <div class="grafica-container">
            <h2>Alteraciones Cardiovasculares y Metabólicas: Sexo vs Índice Cintura-Cadera (ICC)</h2>
            <p style="color: #7f8c8d; margin-bottom: 15px;">
                Riesgo cardiovascular según ICC. Hombres: ICC ≥ 0.9 (riesgo), Mujeres: ICC ≥ 0.85 (riesgo).
            </p>
            <div class="grafica-wrapper">
                <div id="grafica-sexo-icc"></div>
            </div>
        </div>

        <!-- Grasa corporal vs IMC (Nube de puntos) -->
        <div class="grafica-container">
            <h2>Grasa Corporal Total vs IMC</h2>
            <p style="color: #7f8c8d; margin-bottom: 15px;">
                Relación entre el porcentaje de grasa corporal total y el IMC. Cada punto representa un participante.
            </p>
            <div class="grafica-wrapper">
                <div id="grafica-grasa-imc"></div>
            </div>
        </div>

        <!-- 9Dieta Mediterránea vs IMC -->
        <div class="grafica-container">
            <h2>Adherencia a la Dieta Mediterránea vs IMC</h2>
            <p style="color: #7f8c8d; margin-bottom: 15px;">
                Relación entre la puntuación del cuestionario de adherencia a la dieta mediterránea (0-14 puntos) y el IMC.
            </p>
            <div class="grafica-wrapper">
                <div id="grafica-dieta-imc"></div>
            </div>
        </div>
    </div>

    <script>
        // Pasar datos de PHP a JavaScript
        const datosGraficas = <?php echo json_encode($datosGraficas); ?>;
        
        console.log('Datos recibidos para gráficas 5-9:', datosGraficas);
        
        // Función para esperar a que D3 esté cargado
        function esperarD3(callback) {
            if (typeof d3 !== 'undefined') {
                callback();
            } else {
                console.log('Esperando a que D3 se cargue...');
                setTimeout(() => esperarD3(callback), 100);
            }
        }
        
        // Inicializar todas las gráficas cuando el DOM esté listo
        document.addEventListener('DOMContentLoaded', function() {
            esperarD3(function() {
                console.log('D3 cargado correctamente');
                
                // 5Familia profesional vs ICA
                if (datosGraficas.familia_ica && datosGraficas.familia_ica.length > 0) {
                    console.log('Creando gráfica: Familia profesional vs ICA');
                    crearGraficaCategorica(
                        'grafica-familia-ica',
                        datosGraficas.familia_ica,
                        'categoria',
                        'clasificacion_riesgo',
                        'valor_ica',
                        'Riesgo Cardiometabólico por Familia Profesional',
                        'Familia Profesional',
                        'ICA Promedio',
                        'histograma'
                    );
                } else {
                    document.getElementById('grafica-familia-ica').innerHTML = 
                        '<div class="no-datos">⚠️ No hay datos disponibles para esta gráfica</div>';
                }
                
                // 6Centro educativo vs ICA
                if (datosGraficas.centro_ica && datosGraficas.centro_ica.length > 0) {
                    console.log('Creando gráfica: Centro educativo vs ICA');
                    crearGraficaCategorica(
                        'grafica-centro-ica',
                        datosGraficas.centro_ica,
                        'categoria',
                        'clasificacion_riesgo',
                        'valor_ica',
                        'Riesgo Cardiometabólico por Centro Educativo',
                        'Centro Educativo',
                        'ICA Promedio',
                        'histograma'
                    );
                } else {
                    document.getElementById('grafica-centro-ica').innerHTML = 
                        '<div class="no-datos">⚠️ No hay datos disponibles para esta gráfica</div>';
                }
                
                // 7Sexo vs ICC
                if (datosGraficas.sexo_icc && datosGraficas.sexo_icc.length > 0) {
                    console.log('Creando gráfica: Sexo vs ICC');
                    crearGraficaCategorica(
                        'grafica-sexo-icc',
                        datosGraficas.sexo_icc,
                        'categoria',
                        'clasificacion_riesgo',
                        'valor_icc',
                        'Riesgo Cardiovascular por Sexo',
                        'Sexo',
                        'ICC Promedio',
                        'histograma'
                    );
                } else {
                    document.getElementById('grafica-sexo-icc').innerHTML = 
                        '<div class="no-datos">⚠️ No hay datos disponibles para esta gráfica</div>';
                }
                
                // 8Grasa corporal vs IMC (Nube de puntos)
                if (datosGraficas.grasa_imc && datosGraficas.grasa_imc.length > 0) {
                    console.log('Creando gráfica: Grasa corporal vs IMC');
                    crearGraficaDispersion(
                        'grafica-grasa-imc',
                        datosGraficas.grasa_imc,
                        'sexo',
                        'valor_imc',
                        'clasificacion_imc',
                        'Grasa Corporal Total vs IMC',
                        'Sexo',
                        'IMC (kg/m²)'
                    );
                } else {
                    document.getElementById('grafica-grasa-imc').innerHTML = 
                        '<div class="no-datos">⚠️ No hay datos disponibles para esta gráfica</div>';
                }
                
                // 9Dieta Mediterránea vs IMC (Nube de puntos)
                if (datosGraficas.dieta_imc && datosGraficas.dieta_imc.length > 0) {
                    console.log('Creando gráfica: Dieta Mediterránea vs IMC');
                    crearGraficaDispersion(
                        'grafica-dieta-imc',
                        datosGraficas.dieta_imc,
                        'clasificacion_imc',
                        'valor_imc',
                        'clasificacion_imc',
                        'Adherencia Dieta Mediterránea vs IMC',
                        'Clasificación IMC',
                        'IMC (kg/m²)'
                    );
                } else {
                    document.getElementById('grafica-dieta-imc').innerHTML = 
                        '<div class="no-datos">⚠️ No hay datos disponibles para esta gráfica</div>';
                }
            });
        });
    </script>
</body>
</html>
<?php
}
?>