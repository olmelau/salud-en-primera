<!-- Esto es la vista del Formulario de Valores Antropométricos -->
<?php
// require_once "../controllers/antropoController.php";
// Esta comentado porque aun no existe.
// Este controlador llamará a este formulario cuando se clicke en el menu.
// Despues de llamarlo, llamará al modelo AntropoModel.php para que registre en la base de datos los datos de este formulario.
// Se deben controlar los datos son validos en el Modelo.
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta Valores Antropométricos</title>
</head>
<body>
    <h1>RECOGIDA DE DATOS ANONIMIZADA DE VALORES ANTROPOMÉTRICOS</h1>
    
    <form action="index.php?action=antropoController" method="POST">
            <fieldset>    
            <label for="codigo">Código del partipante: </label>
            <input type="text" name="codigo" id="codigo"><br>

            <label for="centro">Centro educativo: </label>
            <input type="centro" name="centro" id="centro"><br>

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
            <label for="peso">1. Peso corporal (kg):</label>
            <input type="number" step="any" id="peso" name="peso"><br><br>
            <label for="talla">2. Talla (cm):</label>
            <input type="number" step="any" id="talla" name="talla">
        </fieldset>

        <fieldset>
            <legend>3. Índices derivados (Cálculo automatizado posterior)</legend>
            <label for="imc">3. Índice de Masa Corporal (IMC) (kg/m²):</label>
            <input type="number" step="any" id="imc" name="imc"><br><br>

            <label>4. Clasificación IMC (OMS) (uso educativo):</label><br>
            <input type="radio" id="bajopeso" name="clasificacion_imc" value="Bajo peso">
            <label for="bajopeso">Bajo peso</label><br>
            <input type="radio" id="normopeso" name="clasificacion_imc" value="Normopeso">
            <label for="normopeso">Normopeso</label><br>
            <input type="radio" id="sobrepeso" name="clasificacion_imc" value="Sobrepeso">
            <label for="sobrepeso">Sobrepeso</label><br>
            <input type="radio" id="obesidad" name="clasificacion_imc" value="Obesidad">
            <label for="obesidad">Obesidad</label>
        </fieldset>

        <fieldset>
            <legend>4. Perímetros corporales</legend>
            <label for="cintura">5. Perímetro de cintura (cm):</label>
            <input type="number" step="any" id="cintura" name="cintura"><br><br>
            <label for="cadera">6. Perímetro de cadera (cm):</label>
            <input type="number" step="any" id="cadera" name="cadera"><br><br>
            <label for="icc">7. Índice cintura-cadera (ICC):</label>
            <input type="number" step="any" id="icc" name="icc"><br><br>
            <label for="cintura_altura">8. Índice cintura-altura:</label>
            <input type="number" step="any" id="cintura_altura" name="cintura_altura">
        </fieldset>

        <fieldset>
            <legend>5. Pliegues y perímetros musculares</legend>
            <label for="pliegue">9. Pliegue cutáneo tricipital (mm):</label>
            <input type="number" step="any" id="pliegue" name="pliegue"><br><br>
            <label for="brazo_relajado">10. Perímetro del brazo relajado (cm):</label>
            <input type="number" step="any" id="brazo_relajado" name="brazo_relajado"><br><br>
            <label for="pmb">11. Perímetro muscular del brazo (PMB) (cm):</label>
            <input type="number" step="any" id="pmb" name="pmb">
        </fieldset>

        <fieldset>
            <legend>6. Composición corporal por bioimpedancia (Equipo homologado – uso educativo)</legend>
            <label for="masa_muscular">12. Masa muscular total (%) / (kg):</label>
            <input type="text" id="masa_muscular" name="masa_muscular"><br><br>
            <label for="grasa_total">13. Grasa corporal total (%):</label>
            <input type="number" step="any" id="grasa_total" name="grasa_total"><br><br>
            <label for="hidratacion">14. Hidratación corporal (%):</label>
            <input type="number" step="any" id="hidratacion" name="hidratacion"><br><br>
            <label for="grasa_visceral">15. Grasa visceral (nivel o índice):</label>
            <input type="number" step="any" id="grasa_visceral" name="grasa_visceral"><br><br>
            <label for="masa_osea">16. Masa ósea (kg):</label>
            <input type="number" step="any" id="masa_osea" name="masa_osea"><br><br>
            <label for="edad_metabolica">17. Edad metabólica:</label>
            <input type="number" step="any" id="edad_metabolica" name="edad_metabolica">
        </fieldset>

        <fieldset>
            <legend>7. Distribución segmentaria</legend>
            <p>18. Distribución de masa muscular por extremidades</p>
            <label for="brazo_derecho_mm">Brazo derecho:</label>
            <input type="text" id="brazo_derecho_mm" name="brazo_derecho_mm"><br>
            <label for="brazo_izquierdo_mm">Brazo izquierdo:</label>
            <input type="text" id="brazo_izquierdo_mm" name="brazo_izquierdo_mm"><br>
            <label for="pierna_derecha_mm">Pierna derecha:</label>
            <input type="text" id="pierna_derecha_mm" name="pierna_derecha_mm"><br>
            <label for="pierna_izquierda_mm">Pierna izquierda:</label>
            <input type="text" id="pierna_izquierda_mm" name="pierna_izquierda_mm"><br>

            <p>19. Distribución de grasa corporal por extremidades</p>
            <label for="brazo_derecho_gc">Brazo derecho:</label>
            <input type="text" id="brazo_derecho_gc" name="brazo_derecho_gc"><br>
            <label for="brazo_izquierdo_gc">Brazo izquierdo:</label>
            <input type="text" id="brazo_izquierdo_gc" name="brazo_izquierdo_gc"><br>
            <label for="pierna_derecha_gc">Pierna derecha:</label>
            <input type="text" id="pierna_derecha_gc" name="pierna_derecha_gc"><br>
            <label for="pierna_izquierda_gc">Pierna izquierda:</label>
            <input type="text" id="pierna_izquierda_gc" name="pierna_izquierda_gc">
        </fieldset>

        <fieldset>
            <legend>8. Variables fisiológicas</legend>
            <label for="fc_reposo">20. Frecuencia cardíaca en reposo (lpm):</label>
            <input type="number" step="any" id="fc_reposo" name="fc_reposo">
        </fieldset>

        <fieldset>
            <legend>9. Observaciones</legend>
            <label for="observaciones">21. Observaciones durante la medición (condiciones de la prueba, incidencias, postura, menstruación, ingesta de medicamentos, uso de anticonceptivos hormonales, patologías previas, etc.)</label><br>
            <textarea id="observaciones" name="observaciones" rows="5" cols="50"></textarea>
        </fieldset>

        <input type="submit" value="Enviar" name="enviar">
   </form>

</body>
</html>