<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuestionario de Calidad de Sueño de Pittsburgh (PSQI)</title>
</head>
<body>


    <?php if (isset($mensaje)): ?>
        <div style="color: <?php echo $tipo_mensaje == 'exito' ? 'green' : 'red'; ?>; padding: 10px; margin: 10px 0; border: 1px solid;">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <form action="index.php" method="post">
        <input type="hidden" name="controller" value="formCalidadSueno">
        <input type="hidden" name="action" value="mandarFormulario">
        
        <h2>ÍNDICE DE CALIDAD DE SUEÑO DE PITTSBURGH (PSQI)</h2>

        <fieldset>
            <legend>Datos del participante</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" size="30">
            <label for="cod_participante">Código del participante: </label>
            <input type="text" name="cod_participante" id="cod_participante" required><br>
            <label for="fecha">Fecha:</label>
            <input type="text" id="fecha" name="fecha" size="10">
            <label for="edad">Edad:</label>
            <input type="text" id="edad" name="edad" size="5"><br><br>
        </fieldset>

        <p><strong>Instrucciones:</strong> Las siguientes cuestiones solo tienen que ver con sus hábitos de sueño durante el último mes. En sus respuestas debe reflejar cual ha sido su comportamiento durante la mayoría de los días y noches del pasado mes. Por favor, conteste a todas las cuestiones.</p>

        <fieldset>
            <legend>Preguntas generales</legend>

            <label for="hora_acostarse">1. Durante el último mes, ¿cuál ha sido, normalmente, su hora de acostarse?</label>
            <input type="text" id="hora_acostarse" name="Sue1" placeholder="ej. 23:30"><br><br>

            <label>2. ¿Cuánto tiempo habrá tardado en dormirse, normalmente, las noches del último mes?</label><br>
            <input type="radio" id="tardar_15" name="Sue2" value="0">
            <label for="tardar_15">Menos de 15 min</label>
            <input type="radio" id="tardar_16_30" name="Sue2" value="1">
            <label for="tardar_16_30">Entre 16-30 min</label>
            <input type="radio" id="tardar_31_60" name="Sue2" value="2">
            <label for="tardar_31_60">Entre 31-60 min</label>
            <input type="radio" id="tardar_mas_60" name="Sue2" value="3">
            <label for="tardar_mas_60">Más de 60 min</label><br><br>

            <label for="hora_levantarse">3. Durante el último mes, ¿a qué hora se ha levantado habitualmente por la mañana?</label>
            <input type="text" id="hora_levantarse" name="Sue3" placeholder="ej. 07:30"><br><br>

            <label for="horas_Sueno">4. ¿Cuántas horas calcula que habrá dormido verdaderamente cada noche durante el último mes?</label>
            <input type="text" id="horas_Sueno" name="Sue4" placeholder="ej. 7.5 horas"><br><br>
        </fieldset>

        <fieldset>
            <legend>5. Durante el último mes, ¿cuántas veces ha tenido usted problemas para dormir a causa de?</legend>

            <p>a) No poder conciliar el Sueño en la primera media hora:</p>
            <input type="radio" id="a_ninguna" name="Sue5a" value="0">
            <label for="a_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="a_menos_1" name="Sue5a" value="1">
            <label for="a_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="a_1_2" name="Sue5a" value="2">
            <label for="a_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="a_3_mas" name="Sue5a" value="3">
            <label for="a_3_mas">Tres o más veces a la semana</label><br><br>

            <p>b) Despertarse durante la noche o de madrugada:</p>
            <input type="radio" id="b_ninguna" name="Sue5b" value="0">
            <label for="b_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="b_menos_1" name="Sue5b" value="1">
            <label for="b_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="b_1_2" name="Sue5b" value="2">
            <label for="b_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="b_3_mas" name="Sue5b" value="3">
            <label for="b_3_mas">Tres o más veces a la semana</label><br><br>

            <p>c) Tener que levantarse para ir al servicio:</p>
            <input type="radio" id="c_ninguna" name="Sue5c" value="0">
            <label for="c_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="c_menos_1" name="Sue5c" value="1">
            <label for="c_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="c_1_2" name="Sue5c" value="2">
            <label for="c_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="c_3_mas" name="Sue5c" value="3">
            <label for="c_3_mas">Tres o más veces a la semana</label><br><br>

            <p>d) No poder respirar bien:</p>
            <input type="radio" id="d_ninguna" name="Sue5d" value="0">
            <label for="d_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="d_menos_1" name="Sue5d" value="1">
            <label for="d_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="d_1_2" name="Sue5d" value="2">
            <label for="d_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="d_3_mas" name="Sue5d" value="3">
            <label for="d_3_mas">Tres o más veces a la semana</label><br><br>

            <p>e) Toser o roncar ruidosamente:</p>
            <input type="radio" id="e_ninguna" name="Sue5e" value="0">
            <label for="e_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="e_menos_1" name="Sue5e" value="1">
            <label for="e_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="e_1_2" name="Sue5e" value="2">
            <label for="e_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="e_3_mas" name="Sue5e" value="3">
            <label for="e_3_mas">Tres o más veces a la semana</label><br><br>

            <p>f) Sentir frío:</p>
            <input type="radio" id="f_ninguna" name="Sue5f" value="0">
            <label for="f_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="f_menos_1" name="Sue5f" value="1">
            <label for="f_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="f_1_2" name="Sue5f" value="2">
            <label for="f_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="f_3_mas" name="Sue5f" value="3">
            <label for="f_3_mas">Tres o más veces a la semana</label><br><br>

            <p>g) Sentir demasiado calor:</p>
            <input type="radio" id="g_ninguna" name="Sue5g" value="0">
            <label for="g_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="g_menos_1" name="Sue5g" value="1">
            <label for="g_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="g_1_2" name="Sue5g" value="2">
            <label for="g_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="g_3_mas" name="Sue5g" value="3">
            <label for="g_3_mas">Tres o más veces a la semana</label><br><br>

            <p>h) Tener pesadillas o malos Sueños:</p>
            <input type="radio" id="h_ninguna" name="Sue5h" value="0">
            <label for="h_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="h_menos_1" name="Sue5h" value="1">
            <label for="h_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="h_1_2" name="Sue5h" value="2">
            <label for="h_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="h_3_mas" name="Sue5h" value="3">
            <label for="h_3_mas">Tres o más veces a la semana</label><br><br>

            <p>i) Sufrir dolores:</p>
            <input type="radio" id="i_ninguna" name="Sue5i" value="0">
            <label for="i_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="i_menos_1" name="Sue5i" value="1">
            <label for="i_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="i_1_2" name="Sue5i" value="2">
            <label for="i_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="i_3_mas" name="Sue5i" value="3">
            <label for="i_3_mas">Tres o más veces a la semana</label><br><br>

            <p>j) Otras razones. Por favor descríbalas:</p>
            <input type="text" id="otras_razones_desc" name="otras_razones_desc" size="50"><br>
            <input type="radio" id="j_ninguna" name="Sue5j" value="0">
            <label for="j_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="j_menos_1" name="Sue5j" value="1">
            <label for="j_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="j_1_2" name="Sue5j" value="2">
            <label for="j_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="j_3_mas" name="Sue5j" value="3">
            <label for="j_3_mas">Tres o más veces a la semana</label><br><br>
        </fieldset>

        <fieldset>
            <legend>6. Calidad del Sueño</legend>
            <label>Durante el último mes, ¿cómo valoraría en conjunto, la calidad de su Sueño?</label><br>
            <input type="radio" id="calidad_muy_buena" name="Sue6" value="0">
            <label for="calidad_muy_buena">Muy buena</label>
            <input type="radio" id="calidad_bastante_buena" name="Sue6" value="1">
            <label for="calidad_bastante_buena">Bastante buena</label>
            <input type="radio" id="calidad_bastante_mala" name="Sue6" value="2">
            <label for="calidad_bastante_mala">Bastante mala</label>
            <input type="radio" id="calidad_muy_mala" name="Sue6" value="3">
            <label for="calidad_muy_mala">Muy mala</label><br><br>
        </fieldset>

        <fieldset>
            <legend>7. Medicación para dormir</legend>
            <label>Durante el último mes, ¿cuántas veces habrá tomado medicinas (por su cuenta o recetadas por el médico) para dormir?</label><br>
            <input type="radio" id="medicacion_ninguna" name="Sue7" value="0">
            <label for="medicacion_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="medicacion_menos_1" name="Sue7" value="1">
            <label for="medicacion_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="medicacion_1_2" name="Sue7" value="2">
            <label for="medicacion_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="medicacion_3_mas" name="Sue7" value="3">
            <label for="medicacion_3_mas">Tres o más veces a la semana</label><br><br>
        </fieldset>

        <fieldset>
            <legend>8. Somnolencia diurna</legend>
            <label>Durante el último mes, ¿cuántas veces ha sentido somnolencia mientras conducía, comía o desarrollaba alguna otra actividad?</label><br>
            <input type="radio" id="somnolencia_ninguna" name="Sue8" value="0">
            <label for="somnolencia_ninguna">Ninguna vez en el último mes</label>
            <input type="radio" id="somnolencia_menos_1" name="Sue8" value="1">
            <label for="somnolencia_menos_1">Menos de una vez a la semana</label>
            <input type="radio" id="somnolencia_1_2" name="Sue8" value="2">
            <label for="somnolencia_1_2">Una o dos veces a la semana</label>
            <input type="radio" id="somnolencia_3_mas" name="Sue8" value="3">
            <label for="somnolencia_3_mas">Tres o más veces a la semana</label><br><br>
        </fieldset>

        <fieldset>
            <legend>9. Ánimos para realizar actividades</legend>
            <label>Durante el último mes, ¿ha representado para usted mucho problema el tener ánimos para realizar alguna de las actividades detalladas en la pregunta anterior?</label><br>
            <input type="radio" id="animo_ningun" name="Sue9" value="0">
            <label for="animo_ningun">Ningún problema</label>
            <input type="radio" id="animo_leve" name="Sue9" value="1">
            <label for="animo_leve">Sólo un leve problema</label>
            <input type="radio" id="animo_problema" name="Sue9" value="2">
            <label for="animo_problema">Un problema</label>
            <input type="radio" id="animo_grave" name="Sue9" value="3">
            <label for="animo_grave">Un grave problema</label><br><br>
        </fieldset>

        <fieldset>
            <legend>10. Compañía para dormir</legend>
            <label>¿Duerme usted solo o acompañado?</label><br>
            <input type="radio" id="compania_solo" name="Sue10" value="0">
            <label for="compania_solo">Solo</label>
            <input type="radio" id="compania_otra_habitacion" name="Sue10" value="1">
            <label for="compania_otra_habitacion">Con alguien en otra habitación</label>
            <input type="radio" id="compania_misma_habitacion" name="Sue10" value="2">
            <label for="compania_misma_habitacion">En la misma habitación, pero en otra cama</label>
            <input type="radio" id="compania_misma_cama" name="Sue10" value="3">
            <label for="compania_misma_cama">En la misma cama</label><br><br>
        </fieldset>

        <br>
        <input type="submit" value="Enviar">
    </form>

    <!-- BOTON PARA VOLVER A LOS FORMULARIOS -->
    <form action="index.php?controller=admin&action=mostrarPaginaAdmin" method="post">
        <input type="submit" value="Volver a los formularios">
    </form>
    
</body>
</html>