<!-- Esto es la vista de Login donde hay un formulario que rellenará el usuario -->
<?php
require_once "../controllers/loginController.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>LOGIN</h1>
    
    <form action="index.php?action=loginController" method="POST">
      <label for="user">User</label>
      <input type="text" name="user" id="user">
      <label for="pass">Contraseña</label>
      <input type="password" name="password" id="password">
      <input type="submit" value="Enviar" name="enviar">
   </form>


</body>
</html>