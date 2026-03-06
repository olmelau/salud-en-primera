<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Participante</title>
</head>
<style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: lightgrey;
        color: #2c3e50;
    }
    
    button{
        border-radius: 10px;
        height: 60px;
        width: 120px;
    }

    div{
        width: 600px;
    }
    
    .formularios_container {
        border-radius: 10px;
        /* width: 500px; */
        margin-bottom: 30px;
        padding: 20px;
        background-color: whitesmoke;
        
        
    }
   
    
    .opt_participante {
        display:inline-flex;
        border-radius: 10px;
        /* width: 500px; */
        margin-bottom: 30px;
        gap: 30px;
        padding: 20px;
        background-color: whitesmoke;
    }

    .btn_cerrar_sesion{
        background-color: lightcoral;
        color: white;

    }
    
</style>

<body>

    
    <h1>PANEL PARTICIPANTE</h1>

   
    <div class="formularios_container">
        
        <h3>FORMULARIOS</h3>
        
        <div class="formularios" style="display: flex; flex-direction: row; gap: 20px; justify-content: center;">
            <!-- VALORES ANTROPOMÓRFICOS -->
            <form action="index.php?controller=formValoresAntopo&action=imprimirFormulario" method="post">
                <button type="submit">Valores Antropomórficos</button>
            </form>
            
            <!-- CALIDAD DEL SUEÑO -->
            <form action="index.php?controller=formCalidadSueno&action=imprimirFormulario" method="post">
                <button type="submit">Calidad del sueño</button>
            </form>

        <!-- DIETA MEDITERRANEA -->
        <form action="index.php?controller=formDietaMediterranea&action=imprimirFormulario" method="post">
            <button type="submit">Dieta Mediterránea</button>
        </form>
        <!-- INTERNACIONAL AF -->
        <form action="index.php?controller=formInternacionalAF&action=imprimirFormulario" method="post">
            <button type="submit">Internacional Actividad Física</button>
        </form>
    </div>
</div>

<div class="opt_participante">

    <h3>MÁS OPCIONES</h3>
    <form method="POST" action="index.php?controller=login&action=logout">
         <button type="submit" class="btn_cerrar_sesion">Cerrar Sesión</button>
    </form>
</div>
</body>
</html>