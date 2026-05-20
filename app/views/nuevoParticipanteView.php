<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../frontend/css/style.css">
    <link rel="stylesheet" href="../frontend/css/style-formulario.css">
    <title>Document</title>
</head>
<body>
    </html>
    <h1>Nuevo Participante</h1>
    
     <?php if (isset($mensaje)): ?>
            <div
               <?php echo $tipo_mensaje == 'exito' ? 'green' : 'red'; ?>;>
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>
    <main>
        <div class="nuevo-part">

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
             
                    <div class="btn-enviar-form">
                        <button type="submit">Enviar</button>
        
                    </div>
            </form>
        </div>
    </main>
    
    <!-- BOTON PARA VOLVER A LOS FORMULARIOS -->
        <form action="index.php?controller=admin&action=mostrarPaginaAdmin" method="post">
            <div class="btn-volver">
                <button type="submit">Volver a los formularios</button>
            </div>
        </form>
    
</body>

</html>
