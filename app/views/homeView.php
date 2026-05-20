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
    <link rel="stylesheet" href="../frontend/css/style.css">
    <link rel="stylesheet" href="../frontend/css/style-login.css">
    <title>Salud en primera</title>
</head>

<body>
    <header>
        <div class="header">
            <img src="../public/assets/Logo.png" class="logo-salud">
            <h1 class="titulo-main">SALUD EN PRIMERA PERSONA</h1>
            <nav class="menu-container">
                <ul class="menu-item"><a href="index.php?controller=landing&action=landing">Inicio</a></ul>
                <ul class="menu-item"><a href="index.php?controller=home&action=home">Log in</a></ul>
            </nav>
        </div>
    </header>
    <main>

   
    <form action="index.php" method="post">
    <div class="login-container">
       
                <input type="hidden" name="controller" value="login">
                <input type="hidden" name="action" value="procesarLogin">
    
                <label for="nombre">Nombre</label>
                <input type="text" name="usuario" id="nombre">
    
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                
                <label for="cod_participante">Código de participante</label>
                <input type="text" name="cod_participante" id="cod_participante" placeholder="00000" required>   
                <button type="submit">Login</button>
          
        </div>
    </form>
     </main>
    <footer>
        <div class="footer-container">
            <div class="item-footer"><img src="../public/assets/es_cofinanciado_logo_peqqueno.png" alt=""></div>
            <div class="item-footer"><img src="../public/assets/FP_CLM.jpg" alt=""></div>
            <div class="item-footer"><img src="../public/assets/JCCM.png" alt=""></div>
            <div class="item-footer"><img src="..public/assets/Ministerio Educaciขn.png" alt=""></div>
            <div class="item-footer"><img src="../public/assets/Logo Hervás.png" alt=""></div>
            <div class="item-footer"><img src="../public/assets/logo_rehecho_fondo_blanco.png" alt=""></div>
        </div>
    </footer>
</body>

</html>