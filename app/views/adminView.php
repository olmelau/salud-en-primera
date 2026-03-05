<!-- app/views/adminView.php -->
<?php
// Mostrar información de sesión para la prueba
echo "<p>Usuario ID: " . $_SESSION['id_user'] . "</p>";
echo "<p>Rol: " . $_SESSION['rol'] . "</p>";
echo "<p>Autenticado: " . ($_SESSION['autenticado'] ? 'Sí' : 'No') . "</p>";
?>

<h1>Página principal admin</h1>

<p>Bienvenido al panel de administración</p>

<!-- FORMULARIO -->
<h3>FORMULARIOS</h3>

<div class="formularios" style="display: flex; flex-direction: row; gap: 20px; justify-content: center;">
    <!-- VALORES ANTROPOMÓRFICOS -->
    <form action="index.php?controller=formValoresAntopo&action=imprimirFormulario" method="post">
        <button type="submit">Ir a Formulario de Valores Antropomórficos</button>
    </form>
    
    <!-- CALIDAD DEL SUEÑO -->
    <form action="index.php?controller=formCalidadSueno&action=imprimirFormulario" method="post">
        <button type="submit">Ir a Formulario de calidad del sueño</button>
    </form>
    
    <!-- DIETA MEDITERRANEA -->
     <form action="index.php?controller=formDietaMediterranea&action=imprimirFormulario" method="post">
        <button type="submit">Ir a Formulario Dieta Mediterranea</button>
    </form>
     <!-- INTERNACIONAL AF -->
       <form action="index.php?controller=formInternacionalAF&action=imprimirFormulario" method="post">
        <button type="submit">Ir a Formulario Internacional AF</button>
    </form>
</div>

        <!-- ANALISIS -->
    <form action="index.php?controller=analisis&action=imprimirAnalisis" method="post">
        <button type="submit">Analisis</button>
    </form>

    <!-- AÑADIR USUARIO NUEVO -->
    <form action="index.php?controller=nuevoParticipante&action=imprimirNuevoParticipante" method="post">
        <button type="submit">Añadir nuevo usuario</button>
    </form>


<!-- También puedes hacerlo con formulario POST -->
<form method="POST" action="index.php?controller=login&action=logout">
    <button type="submit">Cerrar Sesión</button>
</form>
