<!-- app/views/adminView.php -->
<?php
// Mostrar información de sesión para la prueba
echo "<p>Usuario ID: " . $_SESSION['id_user'] . "</p>";
echo "<p>Rol: " . $_SESSION['rol'] . "</p>";
echo "<p>Autenticado: " . ($_SESSION['autenticado'] ? 'Sí' : 'No') . "</p>";
?>

<h1>Página principal admin</h1>

<p>Bienvenido al panel de administración</p>




<!-- Botón para cerrar sesión (GET) -->
<a href="index.php?controller=login&action=logout">
    <button>Cerrar Sesión</button>
</a>

<!-- También puedes hacerlo con formulario POST -->
<!--
<form method="POST" action="index.php?controller=login&action=logout">
    <button type="submit">Cerrar Sesión</button>
</form>
-->