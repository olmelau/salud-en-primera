<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <header>
        <div class="header">
            <img src="../public/assets/Logo.png" class="logo-salud">
            <h1 class="titulo-main">Salud en primera persona</h1>
        </div>
    </header>
    <div class="main-container">
        <p>Aqui se mostrarán las gráficas</p>
        <div>1</div>
        <div>2</div>
        <div>3</div>
        <div>4</div>
        <div>5</div>
        <div>6</div>
        <div>7</div>
    </div>
    <div class="btn-login">
        <button>LOG IN</button>
    </div>
    <div class="footer">
        <p>Esto es el footer e iran aqui los logos que hagan falta</p>
    </div>
</body>
</html>

<!-- --------------------------------------------------------------------------- -->

<?php
function mostrarGraficasIMC($datosGraficas) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../frontend/js/d3.v7.min.js"></script>
    <script src="../frontend/js/graficasGenerales.js" defer></script>
    <title>Inicio</title>
   </head>
<body>
    <div class="container">
        <div class="header">
            <h1>📊 Análisis de Índice de Masa Corporal (IMC)</h1>
            <p>Distribución del IMC según diferentes variables demográficas y educativas</p>
            <a href="index.php?controller=analisis&action=imprimirAnalisis" class="btn-volver">
                ← Volver al Análisis Completo
            </a>
        </div>

        <!-- 1. Familia profesional vs Clasificación IMC -->
        <div class="grafica-container">
            <h2>1. Familia Profesional vs Clasificación IMC</h2>
            <p style="color: #7f8c8d; margin-bottom: 15px;">
                Distribución de las categorías de IMC (Bajo peso, Normopeso, Sobrepeso, Obesidad) 
                agrupadas por familia profesional.
            </p>
            <div class="grafica-wrapper">
                <div id="grafica-familia-imc"></div>
            </div>
        </div>

        <!-- 2. Sexo vs Clasificación IMC -->
        <div class="grafica-container">
            <h2>2. Sexo vs Clasificación IMC</h2>
            <p style="color: #7f8c8d; margin-bottom: 15px;">
                Comparativa de la distribución del IMC entre hombres y mujeres.
            </p>
            <div class="grafica-wrapper">
                <div id="grafica-sexo-imc"></div>
            </div>
        </div>

        <!-- 3. Centro educativo vs Clasificación IMC -->
        <div class="grafica-container">
            <h2>3. Centro Educativo vs Clasificación IMC</h2>
            <p style="color: #7f8c8d; margin-bottom: 15px;">
                Distribución del IMC según el centro educativo de procedencia.
            </p>
            <div class="grafica-wrapper">
                <div id="grafica-centro-imc"></div>
            </div>
        </div>

        <!-- 4. Familia profesional vs IMC (Nube de puntos) -->
        <div class="grafica-container">
            <h2>4. Familia Profesional vs Valores de IMC (Nube de Puntos)</h2>
            <p style="color: #7f8c8d; margin-bottom: 15px;">
                Distribución de los valores individuales de IMC para cada familia profesional.
                Cada punto representa un participante, coloreado según su clasificación de IMC.
            </p>
            <div class="grafica-wrapper">
                <div id="grafica-familia-imc-puntos"></div>
            </div>
        </div>
    </div>

    <script>
        // Pasar datos de PHP a JavaScript
        const datosGraficas = <?php echo json_encode($datosGraficas); ?>;
        
        // Función para verificar si D3 está cargado
        function esperarD3(callback) {
            if (typeof d3 !== 'undefined') {
                callback();
            } else {
                setTimeout(() => esperarD3(callback), 100);
            }
        }
        
        // Inicializar gráficas cuando el DOM y D3 estén listos
        document.addEventListener('DOMContentLoaded', function() {
            esperarD3(function() {
                console.log('Datos recibidos:', datosGraficas);
                
                // 1. Familia profesional vs IMC (Histograma agrupado)
                if (datosGraficas.familia_imc && datosGraficas.familia_imc.length > 0) {
                    crearGraficaCategorica(
                        'grafica-familia-imc',
                        datosGraficas.familia_imc,
                        'categoria',
                        'clasificacion',
                        'cantidad',
                        'Distribución IMC por Familia Profesional',
                        'Familia Profesional',
                        'Cantidad de Participantes',
                        'histograma'
                    );
                } else {
                    document.getElementById('grafica-familia-imc').innerHTML = 
                        '<p style="color: #e74c3c; text-align: center;">No hay datos disponibles para esta gráfica</p>';
                }
                
                // 2. Sexo vs IMC
                if (datosGraficas.sexo_imc && datosGraficas.sexo_imc.length > 0) {
                    crearGraficaCategorica(
                        'grafica-sexo-imc',
                        datosGraficas.sexo_imc,
                        'categoria',
                        'clasificacion',
                        'cantidad',
                        'Distribución IMC por Sexo',
                        'Sexo',
                        'Cantidad de Participantes',
                        'histograma'
                    );
                } else {
                    document.getElementById('grafica-sexo-imc').innerHTML = 
                        '<p style="color: #e74c3c; text-align: center;">No hay datos disponibles para esta gráfica</p>';
                }
                
                // 3. Centro educativo vs IMC
                if (datosGraficas.centro_imc && datosGraficas.centro_imc.length > 0) {
                    crearGraficaCategorica(
                        'grafica-centro-imc',
                        datosGraficas.centro_imc,
                        'categoria',
                        'clasificacion',
                        'cantidad',
                        'Distribución IMC por Centro Educativo',
                        'Centro Educativo',
                        'Cantidad de Participantes',
                        'histograma'
                    );
                } else {
                    document.getElementById('grafica-centro-imc').innerHTML = 
                        '<p style="color: #e74c3c; text-align: center;">No hay datos disponibles para esta gráfica</p>';
                }
                
                // 4. Familia profesional vs IMC (Nube de puntos)
                if (datosGraficas.familia_imc_valor && datosGraficas.familia_imc_valor.length > 0) {
                    crearGraficaDispersion(
                        'grafica-familia-imc-puntos',
                        datosGraficas.familia_imc_valor,
                        'categoria',
                        'valor_imc',
                        'clasificacion',
                        'IMC por Familia Profesional',
                        'Familia Profesional',
                        'IMC (kg/m²)'
                    );
                } else {
                    document.getElementById('grafica-familia-imc-puntos').innerHTML = 
                        '<p style="color: #e74c3c; text-align: center;">No hay datos disponibles para esta gráfica</p>';
                }
            });
        });
    </script>
</body>
</html>
<?php
}
?>