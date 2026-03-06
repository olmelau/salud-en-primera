<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisis</title>
</head>

<style>
    table{
        border: 1px solid black;
    }
</style>

<body>
    <h1>Analisis de los formularios completados</h1>
    
<?php

function imprimirAnalisisSueno($datosSueno){

    echo "<table>";
        foreach ($datosSueno as $fila){
            echo "<tr>";
            foreach ($fila as $celda){
                echo "<td>".$celda."</td>";
            }
            echo "</tr>";
        }
    echo "</table>";
}

function imprimirAnalisisAntopo($datosAntopo){
    echo "<table>";
        foreach ($datosAntopo as $fila){
            echo "<tr>";
            foreach ($fila as $celda){
                echo "<td>".$celda."</td>";
            }
            echo "</tr>";
        }
    echo "</table>";
}

function imprimirAnalisisDieta($datosDieta){
    echo "<table>";
        foreach ($datosDieta as $fila){
            echo "<tr>";
            foreach ($fila as $celda){
                echo "<td>".$celda."</td>";
            }
            echo "</tr>";
        }
    echo "</table>";
}

function imprimirAnalisisFisica($datosFisica){
    echo "<table>";
        foreach ($datosFisica as $fila){
            echo "<tr>";
            foreach ($fila as $celda){
                echo "<td>".$celda."</td>";
            }
            echo "</tr>";
        }
    echo "</table>";
}


?>

</body>
</html>