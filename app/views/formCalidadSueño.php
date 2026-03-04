<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuestionario de Calidad de Sueño de Pittsburgh (PSQI)</title>
</head>
<body>
    <form action="#" method="post">
        <h2>ÍNDICE DE CALIDAD DE SUEÑO DE PITTSBURGH (PSQI)</h2>

        <fieldset>
            <legend>Datos del participante</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" size="30">
            <label for="id">ID#:</label>
            <input type="text" id="id" name="id" size="10">
            <label for="fecha">Fecha:</label>
            <input type="text" id="fecha" name="fecha" size="10">
            <label for="edad">Edad:</label>
            <input type="text" id="edad" name="edad" size="5"><br><br>
        </fieldset>

        <p><strong>Instrucciones:</strong> Las siguientes cuestiones solo tienen que ver con sus hábitos de sueño durante el último mes. En sus respuestas debe reflejar cual ha sido su comportamiento durante la mayoría de los días y noches del pasado mes. Por favor, conteste a todas las cuestiones.</p>

        <fieldset>
            <legend>Preguntas generales</legend>

            <label for="hora_acostarse">1. Durante el último mes, ¿cuál ha sido, normalmente, su hora de acostarse?</label>
            <input type="text" id="hora_acostarse" name="hora_acostarse" placeholder="ej. 23:30"><br><br>

            <label>2. ¿Cuánto tiempo habrá tardado en dormirse, normalmente, las noches del último mes?</label><br>
            <input type="radio" id="tardar_15" name="tiempo_dormir" value="Menos de 15 min">
            <label for="tardar_15">Menos de 15 min</label>
            <input type="radio" id="tardar_16_30" name="tiempo_dormir" value="Entre 16-30 min">
            <label for="tardar_16_30">Entre 16-30 min</label>
            <input type="radio" id="tardar_31_60" name="tiempo_dormir" value="Entre 31-60 min">
            <label for="tardar_31_60">Entre 31-60 min</label>
            <input type="radio" id="tardar_mas_60" name="tiempo_dormir" value="Más de 60 min">
            <label for="tardar_mas_60">Más de 60 min</label><br><br>

            <label for="hora_levantarse">3. Durante el último mes, ¿a qué hora se ha levantado habitualmente por la mañana?</label>
            <input type="text" id="hora_levantarse" name="hora_levantarse" placeholder="ej. 07:30"><br><br>

            <label for="horas_sueno">4. ¿Cuántas horas calcula que habrá dormido verdaderamente cada noche durante el último mes?</label>
            <input type="text" id="horas_sueno" name="horas_sueno" placeholder="ej. 7.5 horas"><br><br>
        </fieldset>

        <fieldset>
            <legend>5. Durante el último mes, ¿cuántas veces ha tenido usted problemas para dormir a causa de?</legend>

            <p>a) No poder conciliar el sueño en la primera media hora:</p>
            <input type="radio" id="a_ninguna" name="problema_a" value="Ninguna vez">
            <label for="a_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="a_menos_1" name="problema_a" value="Menos de una vez a la semana">
            <label for="a_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="a_1_2" name="problema_a" value="Una o dos veces a la semana">
            <label for="a_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="a_3_mas" name="problema_a" value="Tres o más veces a la semana">
            <label for="a_3_mas">Tres o más veces a la semana</label><br><br>

            <p>b) Despertarse durante la noche o de madrugada:</p>
            <input type="radio" id="b_ninguna" name="problema_b" value="Ninguna vez">
            <label for="b_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="b_menos_1" name="problema_b" value="Menos de una vez a la semana">
            <label for="b_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="b_1_2" name="problema_b" value="Una o dos veces a la semana">
            <label for="b_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="b_3_mas" name="problema_b" value="Tres o más veces a la semana">
            <label for="b_3_mas">Tres o más veces a la semana</label><br><br>

            <p>c) Tener que levantarse para ir al servicio:</p>
            <input type="radio" id="c_ninguna" name="problema_c" value="Ninguna vez">
            <label for="c_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="c_menos_1" name="problema_c" value="Menos de una vez a la semana">
            <label for="c_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="c_1_2" name="problema_c" value="Una o dos veces a la semana">
            <label for="c_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="c_3_mas" name="problema_c" value="Tres o más veces a la semana">
            <label for="c_3_mas">Tres o más veces a la semana</label><br><br>

            <p>d) No poder respirar bien:</p>
            <input type="radio" id="d_ninguna" name="problema_d" value="Ninguna vez">
            <label for="d_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="d_menos_1" name="problema_d" value="Menos de una vez a la semana">
            <label for="d_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="d_1_2" name="problema_d" value="Una o dos veces a la semana">
            <label for="d_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="d_3_mas" name="problema_d" value="Tres o más veces a la semana">
            <label for="d_3_mas">Tres o más veces a la semana</label><br><br>

            <p>e) Toser o roncar ruidosamente:</p>
            <input type="radio" id="e_ninguna" name="problema_e" value="Ninguna vez">
            <label for="e_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="e_menos_1" name="problema_e" value="Menos de una vez a la semana">
            <label for="e_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="e_1_2" name="problema_e" value="Una o dos veces a la semana">
            <label for="e_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="e_3_mas" name="problema_e" value="Tres o más veces a la semana">
            <label for="e_3_mas">Tres o más veces a la semana</label><br><br>

            <p>f) Sentir frío:</p>
            <input type="radio" id="f_ninguna" name="problema_f" value="Ninguna vez">
            <label for="f_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="f_menos_1" name="problema_f" value="Menos de una vez a la semana">
            <label for="f_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="f_1_2" name="problema_f" value="Una o dos veces a la semana">
            <label for="f_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="f_3_mas" name="problema_f" value="Tres o más veces a la semana">
            <label for="f_3_mas">Tres o más veces a la semana</label><br><br>

            <p>g) Sentir demasiado calor:</p>
            <input type="radio" id="g_ninguna" name="problema_g" value="Ninguna vez">
            <label for="g_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="g_menos_1" name="problema_g" value="Menos de una vez a la semana">
            <label for="g_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="g_1_2" name="problema_g" value="Una o dos veces a la semana">
            <label for="g_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="g_3_mas" name="problema_g" value="Tres o más veces a la semana">
            <label for="g_3_mas">Tres o más veces a la semana</label><br><br>

            <p>h) Tener pesadillas o malos sueños:</p>
            <input type="radio" id="h_ninguna" name="problema_h" value="Ninguna vez">
            <label for="h_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="h_menos_1" name="problema_h" value="Menos de una vez a la semana">
            <label for="h_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="h_1_2" name="problema_h" value="Una o dos veces a la semana">
            <label for="h_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="h_3_mas" name="problema_h" value="Tres o más veces a la semana">
            <label for="h_3_mas">Tres o más veces a la semana</label><br><br>

            <p>i) Sufrir dolores:</p>
            <input type="radio" id="i_ninguna" name="problema_i" value="Ninguna vez">
            <label for="i_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="i_menos_1" name="problema_i" value="Menos de una vez a la semana">
            <label for="i_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="i_1_2" name="problema_i" value="Una o dos veces a la semana">
            <label for="i_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="i_3_mas" name="problema_i" value="Tres o más veces a la semana">
            <label for="i_3_mas">Tres o más veces a la semana</label><br><br>

            <p>j) Otras razones. Por favor descríbalas:</p>
            <input type="text" id="otras_razones_desc" name="otras_razones_desc" size="50"><br>
            <input type="radio" id="j_ninguna" name="problema_j" value="Ninguna vez">
            <label for="j_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="j_menos_1" name="problema_j" value="Menos de una vez a la semana">
            <label for="j_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="j_1_2" name="problema_j" value="Una o dos veces a la semana">
            <label for="j_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="j_3_mas" name="problema_j" value="Tres o más veces a la semana">
            <label for="j_3_mas">Tres o más veces a la semana</label><br><br>
        </fieldset>

        <fieldset>
            <legend>6. Calidad del sueño</legend>
            <label>Durante el último mes, ¿cómo valoraría en conjunto, la calidad de su sueño?</label><br>
            <input type="radio" id="calidad_muy_buena" name="calidad_sueno" value="Muy buena">
            <label for="calidad_muy_buena">Muy buena</label>
            <input type="radio" id="calidad_bastante_buena" name="calidad_sueno" value="Bastante buena">
            <label for="calidad_bastante_buena">Bastante buena</label>
            <input type="radio" id="calidad_bastante_mala" name="calidad_sueno" value="Bastante mala">
            <label for="calidad_bastante_mala">Bastante mala</label>
            <input type="radio" id="calidad_muy_mala" name="calidad_sueno" value="Muy mala">
            <label for="calidad_muy_mala">Muy mala</label><br><br>
        </fieldset>

        <fieldset>
            <legend>7. Medicación para dormir</legend>
            <label>Durante el último mes, ¿cuántas veces habrá tomado medicinas (por su cuenta o recetadas por el médico) para dormir?</label><br>
            <input type="radio" id="medicacion_ninguna" name="medicacion" value="Ninguna vez">
            <label for="medicacion_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="medicacion_menos_1" name="medicacion" value="Menos de una vez a la semana">
            <label for="medicacion_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="medicacion_1_2" name="medicacion" value="Una o dos veces a la semana">
            <label for="medicacion_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="medicacion_3_mas" name="medicacion" value="Tres o más veces a la semana">
            <label for="medicacion_3_mas">Tres o más veces a la semana</label><br><br>
        </fieldset>

        <fieldset>
            <legend>8. Somnolencia diurna</legend>
            <label>Durante el último mes, ¿cuántas veces ha sentido somnolencia mientras conducía, comía o desarrollaba alguna otra actividad?</label><br>
            <input type="radio" id="somnolencia_ninguna" name="somnolencia" value="Ninguna vez">
            <label for="somnolencia_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="somnolencia_menos_1" name="somnolencia" value="Menos de una vez a la semana">
            <label for="somnolencia_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="somnolencia_1_2" name="somnolencia" value="Una o dos veces a la semana">
            <label for="somnolencia_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="somnolencia_3_mas" name="somnolencia" value="Tres o más veces a la semana">
            <label for="somnolencia_3_mas">Tres o más veces a la semana</label><br><br>
        </fieldset>

        <fieldset>
            <legend>9. Ánimos para realizar actividades</legend>
            <label>Durante el último mes, ¿ha representado para usted mucho problema el tener ánimos para realizar alguna de las actividades detalladas en la pregunta anterior?</label><br>
            <input type="radio" id="animo_ningun" name="animo" value="Ningún problema">
            <label for="animo_ningun">Ningún problema</label>
            <input type="radio" id="animo_leve" name="animo" value="Sólo un leve problema">
            <label for="animo_leve">Sólo un leve problema</label>
            <input type="radio" id="animo_problema" name="animo" value="Un problema">
            <label for="animo_problema">Un problema</label>
            <input type="radio" id="animo_grave" name="animo" value="Un grave problema">
            <label for="animo_grave">Un grave problema</label><br><br>
        </fieldset>

        <fieldset>
            <legend>10. Compañía para dormir</legend>
            <label>¿Duerme usted solo o acompañado?</label><br>
            <input type="radio" id="compania_solo" name="compania" value="Solo">
            <label for="compania_solo">Solo</label>
            <input type="radio" id="compania_otra_habitacion" name="compania" value="Con alguien en otra habitación">
            <label for="compania_otra_habitacion">Con alguien en otra habitación</label>
            <input type="radio" id="compania_misma_habitacion" name="compania" value="En la misma habitación, pero en otra cama">
            <label for="compania_misma_habitacion">En la misma habitación, pero en otra cama</label>
            <input type="radio" id="compania_misma_cama" name="compania" value="En la misma cama">
            <label for="compania_misma_cama">En la misma cama</label><br><br>
        </fieldset>

        <fieldset>
            <legend>Instrucciones para la baremación (secciones para cálculo de puntuaciones)</legend>
            <p><em>Estas secciones son para el cálculo posterior de las puntuaciones de los ítems.</em></p>

            <p><strong>Ítem 1: Calidad Subjetiva de Sueño</strong><br>
            <label for="puntuacion_psqi1">Puntuación Ítem 1:</label>
            <input type="number" id="puntuacion_psqi1" name="puntuacion_psqi1" min="0" max="3" step="1"></p>

            <p><strong>Ítem 2: Latencia de Sueño</strong><br>
            <label for="puntuacion_pregunta2">Puntuación Pregunta 2:</label>
            <input type="number" id="puntuacion_pregunta2" name="puntuacion_pregunta2" min="0" max="3" step="1"><br>
            <label for="puntuacion_pregunta5a">Puntuación Pregunta 5a:</label>
            <input type="number" id="puntuacion_pregunta5a" name="puntuacion_pregunta5a" min="0" max="3" step="1"><br>
            <label for="suma_pregunta2_5a">Suma de la Pregunta 2 y 5a:</label>
            <input type="number" id="suma_pregunta2_5a" name="suma_pregunta2_5a" min="0" max="6" step="1"><br>
            <label for="puntuacion_psqi2">Puntuación Ítem 2:</label>
            <input type="number" id="puntuacion_psqi2" name="puntuacion_psqi2" min="0" max="3" step="1"></p>

            <p><strong>Ítem 3: Duración del Sueño</strong><br>
            <label for="puntuacion_psqi3">Puntuación Ítem 3:</label>
            <input type="number" id="puntuacion_psqi3" name="puntuacion_psqi3" min="0" max="3" step="1"></p>

            <p><strong>Ítem 4: Eficiencia habitual de Sueño</strong><br>
            <label for="horas_sueno_calculo">Número de horas de sueño (Pregunta 4):</label>
            <input type="number" step="any" id="horas_sueno_calculo" name="horas_sueno_calculo"><br>
            <label for="hora_levantarse_calculo">Hora de levantarse (Pregunta 3):</label>
            <input type="text" id="hora_levantarse_calculo" name="hora_levantarse_calculo"><br>
            <label for="hora_acostarse_calculo">Hora de acostarse (Pregunta 1):</label>
            <input type="text" id="hora_acostarse_calculo" name="hora_acostarse_calculo"><br>
            <label for="horas_cama">Número de horas que pasas en la cama:</label>
            <input type="number" step="any" id="horas_cama" name="horas_cama"><br>
            <label for="eficiencia_sueno">Eficiencia Habitual de Sueño (%):</label>
            <input type="number" step="any" id="eficiencia_sueno" name="eficiencia_sueno"><br>
            <label for="puntuacion_psqi4">Puntuación Ítem 4:</label>
            <input type="number" id="puntuacion_psqi4" name="puntuacion_psqi4" min="0" max="3" step="1"></p>

            <p><strong>Ítem 5: Perturbaciones del sueño</strong><br>
            <label for="puntuacion_5b">Puntuación 5b:</label>
            <input type="number" id="puntuacion_5b" name="puntuacion_5b" min="0" max="3" step="1">
            <label for="puntuacion_5c">5c:</label>
            <input type="number" id="puntuacion_5c" name="puntuacion_5c" min="0" max="3" step="1">
            <label for="puntuacion_5d">5d:</label>
            <input type="number" id="puntuacion_5d" name="puntuacion_5d" min="0" max="3" step="1">
            <label for="puntuacion_5e">5e:</label>
            <input type="number" id="puntuacion_5e" name="puntuacion_5e" min="0" max="3" step="1"><br>
            <label for="puntuacion_5f">5f:</label>
            <input type="number" id="puntuacion_5f" name="puntuacion_5f" min="0" max="3" step="1">
            <label for="puntuacion_5g">5g:</label>
            <input type="number" id="puntuacion_5g" name="puntuacion_5g" min="0" max="3" step="1">
            <label for="puntuacion_5h">5h:</label>
            <input type="number" id="puntuacion_5h" name="puntuacion_5h" min="0" max="3" step="1">
            <label for="puntuacion_5i">5i:</label>
            <input type="number" id="puntuacion_5i" name="puntuacion_5i" min="0" max="3" step="1"><br>
            <label for="puntuacion_5j">5j:</label>
            <input type="number" id="puntuacion_5j" name="puntuacion_5j" min="0" max="3" step="1"><br>
            <label for="suma_5b_j">Suma puntuaciones 5b-j:</label>
            <input type="number" id="suma_5b_j" name="suma_5b_j" min="0" max="27" step="1"><br>
            <label for="puntuacion_psqi5">Puntuación Ítem 5:</label>
            <input type="number" id="puntuacion_psqi5" name="puntuacion_psqi5" min="0" max="3" step="1"></p>

            <p><strong>Ítem 6: Utilización de medicación para dormir</strong><br>
            <label for="puntuacion_psqi6">Puntuación Ítem 6:</label>
            <input type="number" id="puntuacion_psqi6" name="puntuacion_psqi6" min="0" max="3" step="1"></p>

            <p><strong>Ítem 7: Disfunción durante el día</strong><br>
            <label for="puntuacion_pregunta8">Puntuación Pregunta 8:</label>
            <input type="number" id="puntuacion_pregunta8" name="puntuacion_pregunta8" min="0" max="3" step="1"><br>
            <label for="puntuacion_pregunta9">Puntuación Pregunta 9:</label>
            <input type="number" id="puntuacion_pregunta9" name="puntuacion_pregunta9" min="0" max="3" step="1"><br>
            <label for="suma_pregunta8_9">Suma de la Pregunta 8 y 9:</label>
            <input type="number" id="suma_pregunta8_9" name="suma_pregunta8_9" min="0" max="6" step="1"><br>
            <label for="puntuacion_psqi7">Puntuación Ítem 7:</label>
            <input type="number" id="puntuacion_psqi7" name="puntuacion_psqi7" min="0" max="3" step="1"></p>

            <p><strong>Puntuación PSQI Total</strong><br>
            <label for="psqi_total">Sume la puntuación de los 7 ítems:</label>
            <input type="number" id="psqi_total" name="psqi_total" min="0" max="21" step="1"></p>
        </fieldset>

        <br>
        <input type="submit" value="Enviar">
    </form>

    <!-- HACER BOTON PARA VOLVER A LA PAGINA DE ADMIN -->
</body>
</html>