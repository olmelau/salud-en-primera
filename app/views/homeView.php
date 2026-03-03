<h1>Soy la pagina Principal</h1>

<!-- FORMULARIO DE INCIO DE SESION -->
 
<form action="index.php" method="post">
    <input type="hidden" name="controller" value="login">
    <input type="hidden" name="action" value="procesarLogin">
    
    <label for="nombre">Nombre</label>
    <input type="text" name="usuario" id="nombre">
    
    <label for="password">Password</label>
    <input type="password" name="password" id="password">

    <button type="submit">Login</button>
</form>