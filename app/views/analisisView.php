<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../frontend/js/d3.v7.min.js"></script>
    <script src="../frontend/js/script.js" defer></script>
    <title>Análisis</title>
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
    if (empty($datosSueno)) return;
    
    // Obtener los nombres de las columnas del primer elemento
    $columnas = array_keys($datosSueno[0]);
    
    echo "<div class='tabla-container'>";
    echo "<div class='tabla-titulo'>Análisis de Sueño</div>";
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
    foreach ($datosSueno as $fila){
        echo "<tr>";
        foreach ($fila as $celda){
            echo "<td>" . $celda . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}

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