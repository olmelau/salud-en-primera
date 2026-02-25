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
    <h1>Formulario ANTROPO</h1>
    
    <form action="index.php?action=antropoController" method="POST">
      <label for="user">User</label>
      <input type="text" name="user" id="user">
      <label for="pass">Contraseña</label>
      <input type="password" name="password" id="password">
      <input type="submit" value="Enviar" name="enviar">
   </form>

</body>
</html>