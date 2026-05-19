<!-- --------------------------------------------------------------------------- -->

<?php
function mostrarGraficasIMC($datosGraficas)
{
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../frontend/js/d3.v7.min.js"></script>
        <script src="../frontend/js/graficasGenerales.js" defer></script>
        <link rel="stylesheet" href="../frontend/css/style.css">
        <title>Inicio</title>
    </head>

    <body>
        <header>
            <div class="header">
                <img src="../public/assets/Logo.png" class="logo-salud">
                <h1 class="titulo-main">Salud en primera persona</h1>
                <nav class="menu-container">
                    <ul class="menu-item"><a href="index.php?controller=landing&action=landing">Inicio</a></ul>
                    <ul class="menu-item"><a href="index.php?controller=home&action=home">Log in</a></ul>
                </nav>
            </div>
        </header>
        <div class="main-container">

            <div class="grafica-wraper">
                <div id="grafica-familia-imc"></div>
            </div>
            <div class="grafica-wraper">
                <div id="grafica-sexo-imc"></div>
            </div>
            <div class="grafica-wraper">
                <div id="grafica-centro-imc"></div>
            </div>
            <div class="grafica-wraper">
                <div id="grafica-familia-imc-puntos"></div>
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
            document.addEventListener('DOMContentLoaded', function () {
                esperarD3(function () {
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