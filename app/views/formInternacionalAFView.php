<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuestionario Internacional AF</title>
</head>
<body>
    <h1>CUESTIONARIO INTERNACIONAL DE ACTIVIDAD FÍSICA</h1>
    
    <?php if (isset($mensaje)): ?>
        <div style="color: <?php echo $tipo_mensaje == 'exito' ? 'green' : 'red'; ?>; padding: 10px; margin: 10px 0; border: 1px solid;">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <form action="index.php" method="post">
        <input type="hidden" name="controller" value="formInternacionalAF">
        <input type="hidden" name="action" value="mandarFormulario">
        
        <fieldset>
            <legend>Datos del participante</legend>
            
            <label for="cod_participante">Código del participante: </label>
            <input type="text" name="cod_participante" value="<?php echo $_SESSION['cod_participante'] ?? ''; ?>" disabled><br><br>
            
            <label for="fecha">Fecha de la medición:</label>
            <input type="date" id="fecha" name="fecha"><br><br>
            <!-- Sale en la documentacion pero jamas se guarda en la base de datos, no existe en ninguna tabla. -->
        </fieldset>

        <fieldset>
           
            <label for="AcF1">1. Durante los últimos 7 días, ¿en cuántos días realizó actividades físicas INTENSAS tales como levantar pesos pesados, cavar, hacer ejercicios aeróbicos o andar rápido en bicicleta?</label><br>
            <input type="number" name="AcF1" id="AcF1" min="0" max="7"> días por semana<br>
           
            <label for="AcF2">2. Habitualmente, ¿cuánto tiempo en total dedicó a una actividad física INTENSA en uno de esos días?</label><br>
            <input type="number" name="AcF2" id="AcF2" min="0"> minutos por día<br>
                  
            <label for="AcF3">3. Durante los últimos 7 días, ¿en cuántos días hizo actividades físicas MODERADAS tales como transportar pesos livianos, o andar en bicicleta a velocidad regular? No incluya caminar.</label><br>
            <input type="number" name="AcF3" id="AcF3" min="0" max="7"> días por semana<br>
                    
            <label for="AcF4">4. Habitualmente, ¿cuánto tiempo en total dedicó a una actividad física MODERADA en uno de esos días?</label><br>
            <input type="number" name="AcF4" id="AcF4" min="0"> minutos por día<br>
          
            <label for="AcF5">5. Durante los últimos 7 días, ¿en cuántos días caminó por lo menos 10 minutos seguidos?</label><br>
            <input type="number" name="AcF5" id="AcF5" min="0" max="7"> días por semana<br>
                      
            <label for="AcF6">6. Habitualmente, ¿cuánto tiempo en total dedicó a CAMINAR en uno de esos días?</label><br>
            <input type="number" name="AcF6" id="AcF6" min="0"> minutos por día<br>
         
            <label for="AcF7">7. Durante los últimos 7 días, ¿cuánto tiempo pasó SENTADO durante un día hábil?</label><br>
            <input type="number" name="AcF7" id="AcF7" min="0"> minutos por día<br>
           
        </fieldset>
        <input type="submit" value="Guardar Cuestionario" name="enviar">
    </form>

    <!-- BOTON PARA VOLVER A LOS FORMULARIOS -->
    <form action="index.php?controller=admin&action=mostrarPaginaAdmin" method="post">
        <input type="submit" value="Volver a los formularios">
    </form>
   </body>
</html>