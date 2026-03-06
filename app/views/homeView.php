<!-- FORMULARIO DE INCIO DE SESION -->

<?php

if (isset($_SESSION['error_login'])) {
    echo '<div class="error">' . $_SESSION['error_login'] . '</div>';
    unset($_SESSION['error_login']); // Limpia el error después de mostrarlo
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salud en primera</title>
</head>
<style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        background-color: lightgray;
        color: #2c3e50;
    }

    button {
        background-color: lightgreen;
        color: black;
        border-radius: 10px;
        height: 50px;
        width: 100px;
    }
    .formularios_container {
        border-radius: 10px;
        /* width: 500px; */
        margin-bottom: 30px;
        padding: 20px;
        background-color: whitesmoke;        
    }

    .error {
        background-color: red;
        color: white;
    }
</style>

<body>

    <div class="titulo">
        <h1>SALUD EN PRIMERA</h1>
    </div>

    <div class="formularios_container">
        <form action="index.php" method="post">
            <input type="hidden" name="controller" value="login">
            <input type="hidden" name="action" value="procesarLogin">

            <label for="nombre">Nombre</label>
            <input type="text" name="usuario" id="nombre">

            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <br><br>
            <label for="cod_participante">Código de participante</label>
            <input type="text" name="cod_participante" id="cod_participante" placeholder="00000" required>
            <br><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>