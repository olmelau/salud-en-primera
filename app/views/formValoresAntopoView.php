<!-- Esto es la vista del Formulario de Valores Antropométricos -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta Valores Antropométricos</title>
</head>
<body>
    <h1>RECOGIDA DE DATOS ANONIMIZADA DE VALORES ANTROPOMÉTRICOS</h1>
    
    <?php if (isset($mensaje)): ?>
        <div style="color: <?php echo $tipo_mensaje == 'exito' ? 'green' : 'red'; ?>; padding: 10px; margin: 10px 0; border: 1px solid;">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <form action="index.php" method="post">
        <input type="hidden" name="controller" value="formValoresAntopo">
        <input type="hidden" name="action" value="mandarFormulario">
        
        <fieldset>    
            <label for="cod_participante">Código del participante: </label>
            <input type="text" name="cod_participante" id="cod_participante" required><br>

            <label for="centro">Centro educativo: </label>
            <input type="text" name="centro" id="centro"><br>

            <label>Familia profesional:</label><br>
            <input type="radio" id="sanidad" name="familia" value="Sanidad">
            <label for="sanidad">Sanidad</label><br>
            <input type="radio" id="seguridad" name="familia" value="Seguridad y Medio Ambiente">
            <label for="seguridad">Seguridad y Medio Ambiente</label><br>
            <input type="radio" id="informatica" name="familia" value="Informática y Comunicaciones">
            <label for="informatica">Informática y Comunicaciones</label><br><br>

            <label for="edad">Edad (años):</label>
            <input type="number" id="edad" name="edad"><br><br>

            <label>Sexo:</label><br>
            <input type="radio" id="mujer" name="sexo" value="Mujer">
            <label for="mujer">Mujer</label><br>
            <input type="radio" id="hombre" name="sexo" value="Hombre">
            <label for="hombre">Hombre</label><br>
            <input type="radio" id="prefiero_no" name="sexo" value="Prefiere no indicar">
            <label for="prefiero_no">Prefiere no indicar</label>
        </fieldset>

        <fieldset>
            <legend>2. Medidas antropométricas básicas</legend>
            <label for="Ant1">1. Peso corporal (kg):</label>
            <input type="number" step="any" id="Ant1" name="Ant1"><br><br>
            <label for="Ant2">2. Talla (cm):</label>
            <input type="number" step="any" id="Ant2" name="Ant2">
        </fieldset>

        <fieldset>
            <legend>3. Índices derivados (Cálculo automatizado posterior)</legend>
            <label for="Ant3">3. Índice de Masa Corporal (IMC) (kg/m²):</label>
            <input type="number" step="any" id="Ant3" name="Ant3"><br><br>

            <label>4. Clasificación IMC (OMS) (uso educativo):</label><br>
            <input type="radio" id="bajopeso" name="Ant4" value="Bajo peso">
            <label for="bajopeso">Bajo peso</label><br>
            <input type="radio" id="normopeso" name="Ant4" value="Normopeso">
            <label for="normopeso">Normopeso</label><br>
            <input type="radio" id="sobrepeso" name="Ant4" value="Sobrepeso">
            <label for="sobrepeso">Sobrepeso</label><br>
            <input type="radio" id="obesidad" name="Ant4" value="Obesidad">
            <label for="obesidad">Obesidad</label>
        </fieldset>

        <fieldset>
            <legend>4. Perímetros corporales</legend>
            <label for="Ant5">5. Perímetro de cintura (cm):</label>
            <input type="number" step="any" id="Ant5" name="Ant5"><br><br>
            <label for="Ant6">6. Perímetro de cadera (cm):</label>
            <input type="number" step="any" id="Ant6" name="Ant6"><br><br>
            <label for="Ant7">7. Índice cintura-cadera (ICC):</label>
            <input type="number" step="any" id="Ant7" name="Ant7"><br><br>
            <label for="Ant8">8. Índice cintura-altura:</label>
            <input type="number" step="any" id="Ant8" name="Ant8">
        </fieldset>

        <fieldset>
            <legend>5. Pliegues y perímetros musculares</legend>
            <label for="Ant9">9. Pliegue cutáneo tricipital (mm):</label>
            <input type="number" step="any" id="Ant9" name="Ant9"><br><br>
            <label for="Ant10">10. Perímetro del brazo relajado (cm):</label>
            <input type="number" step="any" id="Ant10" name="Ant10"><br><br>
            <label for="Ant11">11. Perímetro muscular del brazo (PMB) (cm):</label>
            <input type="number" step="any" id="Ant11" name="Ant11">
        </fieldset>

        <fieldset>
            <legend>6. Composición corporal por bioimpedancia</legend>
            <label for="Ant12">12. Masa muscular total (%) / (kg):</label>
            <input type="text" id="Ant12" name="Ant12"><br><br>
            <label for="Ant13">13. Grasa corporal total (%):</label>
            <input type="number" step="any" id="Ant13" name="Ant13"><br><br>
            <label for="Ant14">14. Hidratación corporal (%):</label>
            <input type="number" step="any" id="Ant14" name="Ant14"><br><br>
            <label for="Ant15">15. Grasa visceral (nivel o índice):</label>
            <input type="number" step="any" id="Ant15" name="Ant15"><br><br>
            <label for="Ant16">16. Masa ósea (kg):</label>
            <input type="number" step="any" id="Ant16" name="Ant16"><br><br>
            <label for="Ant17">17. Edad metabólica:</label>
            <input type="number" step="any" id="Ant17" name="Ant17">
        </fieldset>

        <fieldset>
            <legend>7. Distribución segmentaria</legend>
            <p>18. Distribución de masa muscular por extremidades</p>
            <label for="Ant18_BD">Brazo derecho:</label>
            <input type="text" id="Ant18_BD" name="Ant18_BD"><br>
            <label for="Ant18_BI">Brazo izquierdo:</label>
            <input type="text" id="Ant18_BI" name="Ant18_BI"><br>
            <label for="Ant18_PD">Pierna derecha:</label>
            <input type="text" id="Ant18_PD" name="Ant18_PD"><br>
            <label for="Ant18_PI">Pierna izquierda:</label>
            <input type="text" id="Ant18_PI" name="Ant18_PI"><br>

            <p>19. Distribución de grasa corporal por extremidades</p>
            <label for="Ant19_BD">Brazo derecho:</label>
            <input type="text" id="Ant19_BD" name="Ant19_BD"><br>
            <label for="Ant19_BI">Brazo izquierdo:</label>
            <input type="text" id="Ant19_BI" name="Ant19_BI"><br>
            <label for="Ant19_PD">Pierna derecha:</label>
            <input type="text" id="Ant19_PD" name="Ant19_PD"><br>
            <label for="Ant19_PI">Pierna izquierda:</label>
            <input type="text" id="Ant19_PI" name="Ant19_PI">
        </fieldset>

        <fieldset>
            <legend>8. Variables fisiológicas</legend>
            <label for="Ant20">20. Frecuencia cardíaca en reposo (lpm):</label>
            <input type="number" step="any" id="Ant20" name="Ant20">
        </fieldset>

        <fieldset>
            <legend>9. Observaciones</legend>
            <label for="Ant21">21. Observaciones durante la medición:</label><br>
            <textarea id="Ant21" name="Ant21" rows="5" cols="50"></textarea>
        </fieldset>

        <input type="submit" value="Enviar" name="enviar">
    </form>

    <!-- BOTON PARA VOLVER A LOS FORMULARIOS -->
    <form action="index.php?controller=admin&action=mostrarPaginaAdmin" method="post">
        <input type="submit" value="Volver a los formularios">
    </form>
</body>
</html>