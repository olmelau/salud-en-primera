<?php
require_once '../app/models/formDietaMediterraneaModel.php';


class formDietaMediterraneaController
{
    public function imprimirFormulario()
    {

        session_start();

        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
            // Si NO existe o NO es true, rediriges
            header('Location: index.php?controller=home&action=home');
            exit();
        }
        
        $mensaje = $_SESSION['mensaje'] ?? '';
        $tipo_mensaje = $_SESSION['tipo_mensaje'] ?? '';
        //Control de errores con feedback para el usuario.
        
        
        unset($_SESSION['mensaje'], $_SESSION['tipo_mensaje']);
        
        require_once '../app/views/formDietaMediterraneaView.php';
    }
    public function mandarFormulario()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?controller=formDietaMediterraneaModel&action=imprimirFormulario');
            exit();
        }

        session_start();
        // Almacenamos los datos en un array adaptado a cada formulario.
        $datos = [
            'cod_participante' => $_SESSION['cod_participante'],
            'Ali1' => $_POST['Ali1'] ?? null,
            'Ali2' => $_POST['Ali2'] ?? null,
            'Ali3' => $_POST['Ali3'] ?? null,
            'Ali4' => $_POST['Ali4'] ?? null,
            'Ali5' => $_POST['Ali5'] ?? null,
            'Ali6' => $_POST['Ali6'] ?? null,
            'Ali7' => $_POST['Ali7'] ?? null,
            'Ali8' => $_POST['Ali8'] ?? null,
            'Ali9' => $_POST['Ali9'] ?? null,
            'Ali10' => $_POST['Ali10'] ?? null,
            'Ali11' => $_POST['Ali11'] ?? null,
            'Ali12' => $_POST['Ali12'] ?? null,
            'Ali13' => $_POST['Ali13'] ?? null,
            'Ali14' => $_POST['Ali14'] ?? null,
        ];

        if (empty($datos['cod_participante'])) {
            $_SESSION['mensaje'] = "El código del participante es obligatorio";
            $_SESSION['tipo_mensaje'] = "error";
            header('Location: index.php?controller=formDietaMediterranea&action=imprimirFormulario');
            exit();
        }

        // Crear modelo y guardar
        $modelo = new formInternacionalAFModel();
        
        session_start();


        if ($modelo->verificarParticipanteExiste($datos['cod_participante'])) { //Es obligatorio el cod_participante, si no nos da error grave.
            $_SESSION['mensaje'] = "El participante ya tiene datos registrados";
            $_SESSION['tipo_mensaje'] = "error";
        } else {
            // Si no existe, insertar los datos
            if ($modelo->insertarDatos($datos)) {
                $_SESSION['mensaje'] = "Datos guardados correctamente";
                $_SESSION['tipo_mensaje'] = "exito";
            } else {
                $_SESSION['mensaje'] = "Error al guardar los datos";
                $_SESSION['tipo_mensaje'] = "error";
            }
        }

        header('Location: index.php?controller=formDietaMediterranea&action=imprimirFormulario');
        exit();
    }
}