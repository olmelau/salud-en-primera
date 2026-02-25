<?php

/*

HACER UNA VISTA HOME, donde se muestra descripcion del proyecto y unas graficas o algo asi han dicho.

SI SE HA CLICKADO UN BOTON - Se cumple condicion en el index

Si se cumple esa condicion llamar al loginController

Una vez se ha iniciado sesion tenemos una condicion superior que se cumple.

Si esa se cumple llamar al menuController.php 
En este podremos elegir los 4 formularios.

Al clickar en cualquiera de los 4, se cumple otra condicion.
Cada una de estas condiciones llamara a cada una de los controladores

EJEMPLO

$action = $_GET['action'] ?? 'home';

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "<h1>Error: Acción no válida</h1>";
}
?>

Si se ha pulsado el boton de iniciar sesion. Manda a LoginController -> Inicio Sesion.

Si es correcto llamara a MenuController -> Mostrar Botones

Si se clickan esos botones llamara a antropoController.php 


ANALISIS Y AL MOSTRAR SI LOS FORMULARIOS SE HAN RELLENADO ES LA PARTE QUE HACEMOS CON LA API.

Es decir, si al pulsar el boton analisis, tenemos $_GET['action']=analisis
se llama a un controlador llamado analisis.
Este llama a su view analisis. Aqui se hace el get o lo que sea de la API y se obtiene el JSON con los datos que vienen del modelo.
Creo
Y ya con los datos de la API y Javascript crearemos lo que se tenga que ver en Analisis (Esto es para el 24 de mayo)


*/


?>