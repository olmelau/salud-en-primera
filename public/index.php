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

$action = $_GET['action'] ?? $_POST['action'] ?? 'home';


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



/*
 $url = isset($_GET['url']) ? explode('/', rtrim($_GET['url'], '/')) : [];
        
        // Determinar controlador
        if(!empty($url[0])) {
            $nombreControlador = ucfirst($url[0]) . 'Controller';
            $archivoControlador = 'controladores/' . $nombreControlador . '.php';
            
            if(file_exists($archivoControlador)) {
                require_once $archivoControlador;
                $controlador = new $nombreControlador();
                
                // Determinar método
                $metodo = isset($url[1]) && method_exists($controlador, $url[1]) ? $url[1] : 'index';
                
                // Llamar al método
                $controlador->$metodo();
            } else {
                // Si no existe el controlador, usar el por defecto
                $this->cargarControladorPorDefecto($url);
            }

*/


$controller = $_GET['controller'] ?? $_POST['controller'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'home';

$parametros = [];

//Un ejemplo de GET o POST que nos llega es el siguiente: index.php?controller=usuario&action=editar&id=1&nombre=juan&email=juan@test.com
//Tenemos que recorrer todo lo que nos llega
//Arriba ya hemos guardado en la variable $controller el valor usuario
//Y en la variable Action el valor editar, que sera un metodo dentro de la clase UsuarioController.

foreach ($_GET as $key => $value) { //Recorremos todos los valores que nos vienen en el get, guardando como clave valor.
    if (!in_array($key, ['controller', 'action'])) { //Esta linea es porque no queremos incluir controller ni action en el array parametros.
        $parametros[$key] = $value; //Importante guardarlo como array porque no sabemos cuantos valores pasaremos.
    }
}

//Lo mismo si el method es POST, por ejemplo para el inicio de sesion, sera algo asi:
//index.php?controller=login&action=procesarLogin&usuario=Asier&password=Password
foreach ($_POST as $key => $value) {
    if (!in_array($key, ['controller', 'action'])) {
        $parametros[$key] = $value;
    }
}


// Construir nombre del archivo y clase
$controllerName = $controller . 'Controller'; 
$controllerFile = '../app/controllers/' . $controllerName . '.php';

if(file_exists($controllerFile)) {
    require_once $controllerFile;
    
    // Crear instancia del controlador
    $controllerInstance = new $controllerName();
    
    //Comprobamos si tiene parametros
     if(!empty($parametros)){
        if(method_exists($controllerInstance, $action)) {
        $controllerInstance->$action($parametros);
        }
    } else if(method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    } else {
        die("Método $action no encontrado en $controllerName");
    }
} else {
    die("Controlador $controllerName no encontrado");
    }
    
   


?>