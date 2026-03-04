<?php
require_once '../app/models/formCalidadSuenoModel.php';


class formCalidadSuenoController
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
        
        
        unset($_SESSION['mensaje'], $_SESSION['tipo_mensaje']);
        
        require_once '../app/views/formCalidadSuenoView.php';
    }
    public function mandarFormulario()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?controller=formCalidadSueno&action=imprimirFormulario');
            exit();
        }

        // Recoger datos del formulario de forma simple
        $datos = [
            'cod_participante' => $_POST['cod_participante'] ?? null,
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
            $_SESSION['mensaje'] = "El código del participante es obligatorio";
            $_SESSION['tipo_mensaje'] = "error";
            header('Location: index.php?controller=formCalidadSueno&action=imprimirFormulario');
            exit();
        }

        // Crear modelo y guardar
        $modelo = new formCalidadSuenoModel();
        
        session_start();


        if ($modelo->verificarParticipanteExiste($datos['cod_participante'])) {
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

        header('Location: index.php?controller=formCalidadSueno&action=imprimirFormulario');
        exit();
    }
}