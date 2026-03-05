
<h1>Página principal participante</h1>

<p>Bienvenido al panel de participante</p>

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

<!-- También puedes hacerlo con formulario POST -->
<form method="POST" action="index.php?controller=login&action=logout">
    <button type="submit">Cerrar Sesión</button>
</form>
