<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../frontend/js/d3.v7.min.js"></script>
    <script src="../frontend/js/script.js" defer></script>
    <title>Análisis</title>
    <script src="../frontend/js/d3.v7.min.js"></script>
    <script src="../frontend/js/script.js" defer></script>
</head>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html, body {
        width: 100%;
        max-width: 100%;
        height: 100%;
    }

    body {
        background-color: #f5f5f5;
        padding: 20px;
        color: #333;
    }

    h1 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 10px;
        border-bottom: 3px solid #3498db;
    }

    /* Título de cada tabla */
    .tabla-titulo {
        background: linear-gradient(135deg, #3498db, #2980b9);
        color: white;
        padding: 12px 15px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 8px 8px 0 0;
        width: 100%;
        margin-top: 20px;
    }

    /* Contenedor principal de cada tabla */
    .tabla-contenedor {
        width: 100%;
        margin-bottom: 30px;
        background-color: white;
        border-radius: 0 0 8px 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden; 
    }

    
    table {
        border-collapse: collapse;
        width: 100%;
        min-width: 100%;
        background-color: white;
        table-layout: auto;
    }

    /* Estilo para los encabezados */
    table thead th {
        color: white;
        font-weight: bold;
        padding: 12px 15px;
        font-size: 12px;
        text-transform: uppercase;
        border: 1px solid #34495e;
        text-align: left;
        white-space: nowrap;
        top: 0;
        z-index: 10;
    }

    /* Estilo para las celdas de datos (DENTRO del scroll) */
    table tbody td {
        border: 1px solid #ddd;
        padding: 10px 15px;
        text-align: left;
        white-space: nowrap;
    }

    table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

   

    /* Estilos para el botón */
    .boton-volver {
        text-align: center;
        margin-top: 40px;
        margin-bottom: 20px;
        width: 100%;
    }

    button{
        border-radius: 10px;
        height: 60px;
        width: 120px;
    }
</style>

<body>
    <h1>Análisis de los formularios completados</h1>

<?php
function imprimirAnalisisSueno($datosSueno){
    // Debug: Ver qué datos llegan
    error_log("Datos de sueño recibidos: " . print_r($datosSueno, true));
    
    $datosImprimir = array();
    
    if (!empty($datosSueno) && isset($datosSueno[0])) {
        $fila = $datosSueno[0]; // Solo hay una fila por participante
        
        // Opción 1: Si quieres mostrar las horas dormidas (Sue4)
        if (isset($fila['Sue4']) && $fila['Sue4'] !== null) {
            $datosImprimir[] = (float)$fila['Sue4'];
        }
        
        // Opción 2: Si quieres mostrar todos los valores de frecuencia (0-3)
        $campos_frecuencia = [
            'Sue5a', 'Sue5b', 'Sue5c', 'Sue5d', 'Sue5e', 
            'Sue5f', 'Sue5g', 'Sue5h', 'Sue5i', 'Sue5j'
        ];
        
        foreach ($campos_frecuencia as $campo) {
            if (isset($fila[$campo]) && $fila[$campo] !== null) {
                $datosImprimir[] = (int)$fila[$campo];
            }
        }
        
        // También puedes añadir otros campos numéricos
        $otros_campos = ['Sue2', 'Sue6', 'Sue7', 'Sue8', 'Sue9', 'Sue10'];
        foreach ($otros_campos as $campo) {
            if (isset($fila[$campo]) && $fila[$campo] !== null) {
                $datosImprimir[] = (int)$fila[$campo];
            }
        }
    }
    
    // Debug: Ver datos extraídos
    error_log("Datos para histograma: " . print_r($datosImprimir, true));
    
    ?>
    <div id="histograma_generado"></div>
    
    <script>
    // Pasar datos de PHP a JavaScript
    const datosSueno = <?php echo json_encode($datosImprimir); ?>;
    
    console.log('Datos recibidos en JavaScript:', datosSueno);
    
    // Esperar a que el DOM esté listo y D3 cargado
    document.addEventListener('DOMContentLoaded', function() {
        if (datosSueno && datosSueno.length > 0) {
            console.log('Creando histograma con', datosSueno.length, 'datos');
            crearHistograma(datosSueno);
        } else {
            console.warn('No hay datos válidos para el histograma');
            document.getElementById('histograma_generado').innerHTML = 
                '<p class="alert alert-warning">No hay datos suficientes para generar el histograma de sueño.</p>';
        }
    });
    </script>
    <?php
}
?>
    

<?php

function imprimirAnalisisAntopo($datosAntopo){
    if (empty($datosAntopo)) return;
    
    // Obtener los nombres de las columnas del primer elemento
    $columnas = array_keys($datosAntopo[0]);
    
    echo "<div class='tabla-container'>";
    echo "<div class='tabla-titulo'>Análisis Antropométrico</div>";
    echo "<table>";
    
    // Mostrar encabezados de columnas
    echo "<tr>";
    foreach ($columnas as $columna) {
        // Formatear el nombre de la columna (reemplazar guiones bajos por espacios y capitalizar)
        $nombreFormateado = ucwords(str_replace('_', ' ', $columna));
        echo "<th>" . $nombreFormateado . "</th>";
    }
    echo "</tr>";
    
    // Mostrar datos
    foreach ($datosAntopo as $fila){
        echo "<tr>";
        foreach ($fila as $celda){
            echo "<td>" . $celda . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}

function imprimirAnalisisDieta($datosDieta){
    if (empty($datosDieta)) return;
    
    // Obtener los nombres de las columnas del primer elemento
    $columnas = array_keys($datosDieta[0]);
    
    echo "<div class='tabla-container'>";
    echo "<div class='tabla-titulo'>Análisis de Dieta</div>";
    echo "<table>";
    
    // Mostrar encabezados de columnas
    echo "<tr>";
    foreach ($columnas as $columna) {
        // Formatear el nombre de la columna (reemplazar guiones bajos por espacios y capitalizar)
        $nombreFormateado = ucwords(str_replace('_', ' ', $columna));
        echo "<th>" . $nombreFormateado . "</th>";
    }
    echo "</tr>";
    
    // Mostrar datos
    foreach ($datosDieta as $fila){
        echo "<tr>";
        foreach ($fila as $celda){
            echo "<td>" . $celda . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}

function imprimirAnalisisFisica($datosFisica){
    if (empty($datosFisica)) return;
    
    // Obtener los nombres de las columnas del primer elemento
    $columnas = array_keys($datosFisica[0]);
    
    echo "<div class='tabla-container'>";
    echo "<div class='tabla-titulo'>Análisis de Actividad Física</div>";
    echo "<table>";
    
    // Mostrar encabezados de columnas
    echo "<tr>";
    foreach ($columnas as $columna) {
        // Formatear el nombre de la columna (reemplazar guiones bajos por espacios y capitalizar)
        $nombreFormateado = ucwords(str_replace('_', ' ', $columna));
        echo "<th>" . $nombreFormateado . "</th>";
    }
    echo "</tr>";
    
    // Mostrar datos
    foreach ($datosFisica as $fila){
        echo "<tr>";
        foreach ($fila as $celda){
            echo "<td>" . $celda . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}


?>

<!-- BOTON PARA VOLVER A LOS FORMULARIOS  -->
<div class="boton-volver">
    <form action="index.php?controller=admin&action=mostrarPaginaAdmin" method="post">
        <button type="submit" value="Volver a los formularios">Volver a los formularios</button>
    </form>
</div>


</body>
</html>