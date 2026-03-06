<?php
require_once '../app/models/formCalidadSuenoModel.php';


class formCalidadSuenoController
{
    public function imprimirFormulario()
    {

        session_start(); //Iniciamos sesion en cada controlador porque en el index nos daba problemas para traer el cod_usuario. 
        //Ademas puede ser dentro de los metodos o fuera, lo dejamos dentro aunque sean dos lineas en lugar de una porque nos parece más claro para seguir la ejecucion.

        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
             // Siempre comprobamos que la session se ha iniciado a traves del login, y no se ha llegado aquí directamente. (Ha pasado por el switch adecuadamente.)
            header('Location: index.php?controller=home&action=home');
            exit();
        }
        
        $mensaje = $_SESSION['mensaje'] ?? '';
        $tipo_mensaje = $_SESSION['tipo_mensaje'] ?? '';
        //Control de errores con feedback para el usuario. Si ha llegado algun mensaje imprimira en el view.
        
        unset($_SESSION['mensaje'], $_SESSION['tipo_mensaje']);
        //No los queremos mantener en la session, una vez se guardan en la variable se han quitado para imprimirlos
        
        require_once '../app/views/formCalidadSuenoView.php';
    }
    public function mandarFormulario()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?controller=formCalidadSueno&action=imprimirFormulario');
            exit();
        } //Siempre tenemos que asegurarnos que venimos de POST para evitar llegar a este formulario a traves de URL.

        session_start();
        
        // Almacenamos los datos en un array adaptado a cada formulario.

        //Es clave que el nombre de la clave sea igual al nombre de la columna de la base de datos, aunque sea lioso.
        $datos = [ 
            'cod_participante' => $_SESSION['cod_participante'],
            //Realmente el valor que llega del formulario en disabled para cod_participante no lo usamos, es algo estetico, lo sacamos de nuevo de la sesion para evitar errores.
            'Sue1' => $_POST['Sue1'] ?? null,
            'Sue2' => $_POST['Sue2'] ?? null,
            'Sue3' => $_POST['Sue3'] ?? null,
            'Sue4' => $_POST['Sue4'] ?? null,
            'Sue5a' => $_POST['Sue5a'] ?? null,
            'Sue5b' => $_POST['Sue5b'] ?? null,
            'Sue5c' => $_POST['Sue5c'] ?? null,
            'Sue5d' => $_POST['Sue5d'] ?? null,
            'Sue5e' => $_POST['Sue5e'] ?? null,
            'Sue5f' => $_POST['Sue5f'] ?? null,
            'Sue5g' => $_POST['Sue5g'] ?? null,
            'Sue5h' => $_POST['Sue5h'] ?? null,
            'Sue5i' => $_POST['Sue5i'] ?? null,
            'Sue5j' => $_POST['Sue5j'] ?? null,
            'otras_razones_desc' => $_POST['otras_razones_desc'] ?? null,
            'Sue6' => $_POST['Sue6'] ?? null,
            'Sue7' => $_POST['Sue7'] ?? null,
            'Sue8' => $_POST['Sue8'] ?? null,
            'Sue9' => $_POST['Sue9'] ?? null,
            'Sue10' => $_POST['Sue10'] ?? null
        ];

        if (empty($datos['cod_participante'])) { 
            //Volvemos a asegurar que el cod_participante existe, es clave para evitar "llenar" la base de datos sin identificadores.
            //Que ademas de errores en la consulta rompería la relación de tablas.
            //Esta comprobación no sería necesaria si el usuario que ha inicado sesion estuviera relacionado con la tabla participantes.
            $_SESSION['mensaje'] = "El código del participante es obligatorio";
            $_SESSION['tipo_mensaje'] = "error";
            header('Location: index.php?controller=formCalidadSueno&action=imprimirFormulario');
            exit();
        }

        // Crear modelo y guardar
        $modelo = new formCalidadSuenoModel();

        if ($modelo->verificarParticipanteExiste($datos['cod_participante'])) { //Es obligatorio el cod_participante, si no nos da error grave. Por eso el If anterior.
            $_SESSION['mensaje'] = "El participante ya tiene datos registrados";
            $_SESSION['tipo_mensaje'] = "error";
            //Aqui es el mensaje que mostramos en la parte superior dependiendo del tipo de error.
        } else {
            // Si no existe, insertar los datos
            if ($modelo->insertarDatos($datos)) {
                $_SESSION['mensaje'] = "Datos guardados correctamente";
                $_SESSION['tipo_mensaje'] = "exito";
            } else {
                //Si se llega aqui ha fallado la consulta, no se debería llegar nunca si no intentan "romper" el codigo.
                //No ha hecho la consulta si llega aqui, aseguramos la integridad de la BD.
                $_SESSION['mensaje'] = "Error al guardar los datos";
                $_SESSION['tipo_mensaje'] = "error";
            }
        }

        header('Location: index.php?controller=formCalidadSueno&action=imprimirFormulario');
        exit();
    }
}