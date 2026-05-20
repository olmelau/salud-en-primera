<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../frontend/js/d3.v7.min.js"></script>
    <script src="../frontend/js/graficasGenerales.js" defer></script>
    <link rel="stylesheet" href="../frontend/css/style.css">
    <title>Panel Admin</title>
</head>

<body>
    <header>
        <div class="header">
            <img src="../public/assets/Logo.png" class="logo-salud">
            <h1 class="titulo-main">PANEL ADMIN</h1>
            <nav class="menu-container">
                <ul class="menu-item"><a href="index.php?controller=landing&action=landing">Inicio</a></ul>
                <ul class="menu-item"><a href="index.php?controller=home&action=home">Log in</a></ul>
                <ul class="menu-item"><a href="index.php?controller=login&action=logout">Log out</a></ul>
            </nav>
        </div>
    </header>

    <main>
        <!-- FORMULARIO -->
        <div class="formularios-container">

            <h3>FORMULARIOS</h3>

            <div class="botones-formularios">
                <!-- VALORES ANTROPOMÓRFICOS -->
                <form action="index.php?controller=formValoresAntopo&action=imprimirFormulario" method="post">
                    <button type="submit">Valores Antropomórficos</button>
                </form>
                

                <!-- CALIDAD DEL SUEÑO -->
                <form action="index.php?controller=formCalidadSueno&action=imprimirFormulario" method="post">
                    <button type="submit">Calidad del sueño</button>
                </form>

                <!-- DIETA MEDITERRANEA -->
                <form action="index.php?controller=formDietaMediterranea&action=imprimirFormulario" method="post">
                    <button type="submit">Dieta Mediterránea</button>
                </form>
                <!-- INTERNACIONAL AF -->
                <form action="index.php?controller=formInternacionalAF&action=imprimirFormulario" method="post">
                    <button type="submit">Actividad Física</button>
                </form>
            </div>
        </div>

        <h3>ANÁLISIS DE RESULTADOS</h3>
        <div class="analisis-container">
            <!-- ANALISIS -->
            <form action="index.php?controller=analisis&action=imprimirAnalisis" method="post">
                <button type="submit">Analisis</button>
            </form>

        </div>
        <!-- OPCIONES DE ADMINISTRADOR -->
        <h3>MÁS OPCIONES</h3>
        <div class="opt-admin">


            <form action="index.php?controller=nuevoParticipante&action=imprimirNuevoParticipante" method="post">
                <button type="submit" class="btn_nuevo_user">Datos Participante</button>
            </form>
            

        </div>

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