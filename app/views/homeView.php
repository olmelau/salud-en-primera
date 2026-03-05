<h1>Soy home view</h1>

<!-- FORMULARIO DE INCIO DE SESION -->

<?php

if (isset($_SESSION['error_login'])) {
    echo '<div class="error">' . $_SESSION['error_login'] . '</div>';
    unset($_SESSION['error_login']); // Limpia el error después de mostrarlo
}

?>
 
<form action="index.php" method="post">
    <input type="hidden" name="controller" value="login">
    <input type="hidden" name="action" value="procesarLogin">
    
    <label for="nombre">Nombre</label>
    <input type="text" name="usuario" id="nombre">
    
    <label for="password">Password</label>
    <input type="password" name="password" id="password">

    <label for="cod_participante">Codigo de participante</label>
    <input type="text" name="cod_participante" id="cod_participante" placeholder="00000" require>

    <button type="submit">Login</button>
</form>