<!-- CUESTIONARIO INTERNACIONAL DE ACTIVIDAD FÍSICA -->

<!-- 1. Durante los últimos 7 días, ¿en cuántos realizó actividades físicas intensas tales como levantar pesos pesados, cavar, hacer ejercicios aeróbicos o andar rápido en bicicleta? -->
    <!-- Días por semana (indique el número) -->
    <!-- Ninguna actividad física intensa (pase a la pregunta 3) -->

<!-- 2. Habitualmente, ¿cuánto tiempo en total dedicó a una actividad física intensa en uno de esos días? -->
    <!-- Indique cuántos minutos por día -->
    <!-- No sabe/no está seguro -->

<!--3. Durante los últimos 7 días, ¿en cuántos días hizo actividades físicas moderadas tales como transportar pesos livianos, o andar en bicicleta a velocidad regular? No incluya caminar -->
    <!-- Días por semana (indicar el número) -->
     <!-- Ninguna actividad física moderada (pase a la pregunta 5) -->

<!-- 4. Habitualmente, ¿cuánto tiempo en total dedicó a una actividad física moderada en uno de esos días? -->
    <!-- Indique cuántos minutos por día -->
    <!-- No sabe/no está seguro -->

<!-- 5. Durante los últimos 7 días, ¿en cuántos días caminó por lo menos 10 minutos seguidos? -->
    <!-- Días por semana (indique el número) -->
    <!-- Ninguna caminata (pase a la pregunta 7) -->

<!-- 6. Habitualmente, ¿cuánto tiempo en total dedicó a caminar en uno de esos días? -->
    <!-- Indique cuántos minutos por día -->
    <!-- No sabe/no está seguro -->

<!-- 7. Durante los últimos 7 días, ¿cuánto tiempo pasó sentado durante un día hábil? -->
    <!-- Indique cuántos minutos por día -->
    <!-- No sabe/no está seguro -->

<!-- VALORACIÓN:
• Ítems 5 y 6: Caminatas: 3,3 MET x minutos de caminata x días por semana (Ej. 3,3 x 30 minutos x 5 días = 495 MET)
• Ítems 3 y 4: Actividad Física Moderada: 4 MET X minutos x días por semana
• Ítems 1 y 2: Actividad Física Vigorosa: 8 MET X minutos x días por semana -->

<!-- A continuación, se suman los tres valores obtenidos:
Cálculo total MET= MET caminata + MET actividad física moderada + MET actividad física vigorosa
Las preguntas del “tiempo sentado” (ítem 7) aportan una información adicional sobre el tiempo que se gasta en una actividad sedentaria, no estando incluida en el resultado general de actividad física. -->

<!-- Criterios de clasificación: NIVEL DE ACTIVIDAD
NIVEL ALTO
    Si se cumple cualquiera de los siguientes dos criterios:
        • Actividad Física Vigorosa por lo menos 3 días por semana logrando un total de al menos 1.500 MET.
        • 7 días de cualquier combinación de caminata, con actividad física moderada y/o actividad física vigorosa, logrando un total de al menos 3.000 MET.
NIVEL MODERADO
    Si se cumple cualquiera de los siguientes criterios:
        • 3 o más días de actividad física vigorosa por lo menos 20 minutos por día.
        • 5 o más días de actividad física moderada y/o caminata al menos 30 minutos por día.
        • 5 o más días de cualquiera de las combinaciones de caminata, actividad física moderada o vigorosa logrando como mínimo un total de 600 MET.
NIVEL BAJO O INACTIVO
        Si no hay actividad física o si esta es insuficiente para incluirla en las categorías anteriores. -->

<!-- Vista del Formulario Cuestionario Internacional de Actividad Física) -->

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
            <input type="text" name="cod_participante" id="cod_participante" required><br><br>
            
            <label for="fecha">Fecha de la medición:</label>
            <input type="date" id="fecha" name="fecha"><br><br>
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

    <!-- HACER BOTON PARA VOLVER A LA PAGINA DE ADMIN -->
    
   </body>
</html>