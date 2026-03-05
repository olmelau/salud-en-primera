<h1>Nuevo Participante</h1>

 <?php if (isset($mensaje)): ?>
        <div
            style="color: <?php echo $tipo_mensaje == 'exito' ? 'green' : 'red'; ?>; padding: 10px; margin: 10px 0; border: 1px solid;">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

<form action="index.php" method="post">
    <input type="hidden" name="controller" value="nuevoParticipante">
    <input type="hidden" name="action" value="nuevoParticipante">

    <label for="nombre">Código Participante: </label>
    <input type="number" name="cod_participante" id="cod_participante"><br><br>
    <label for="centro_educativo">Centro Educativo</label>
    <input type="text" name="centro_educativo" id="centro_educativo"><br><br>
    <label for="familia_profesional">Familia profesional</label>
    <input type="text" name="familia_profesional" id="familia_profesional"><br><br>
    <label for="edad">Edad</label>
    <input type="number" name="edad" id="edad"><br><br>
    <select id="sexo" name="sexo" required>
        <option value="">Selecciona una opción</option>
        <option value="Mujer">Mujer</option>
        <option value="Hombre">Hombre</option>
        <option value="Prefiere no indicar">Prefiere no indicar</option>
    </select>
    <br><br>
    <input type="submit" value="enviar">
</form>

<!-- BOTON PARA VOLVER A LOS FORMULARIOS -->
    <form action="index.php?controller=admin&action=mostrarPaginaAdmin" method="post">
        <input type="submit" value="Volver a los formularios">
    </form>
