<?php
require_once '../app/models/formValoresAntopoModel.php';


class formValoresAntopoController
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
        
        require_once '../app/views/formValoresAntopoView.php';
    }
    public function mandarFormulario()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?controller=formValoresAntopo&action=imprimirFormulario');
            exit();
        }

        // Recoger datos del formulario de forma simple
        $datos = [
            'cod_participante' => $_POST['cod_participante'] ?? null,
            'Ant1' => $_POST['Ant1'] ?? null,
            'Ant2' => $_POST['Ant2'] ?? null,
            'Ant3' => $_POST['Ant3'] ?? null,
            'Ant4' => $_POST['Ant4'] ?? null,
            'Ant5' => $_POST['Ant5'] ?? null,
            'Ant6' => $_POST['Ant6'] ?? null,
            'Ant7' => $_POST['Ant7'] ?? null,
            'Ant8' => $_POST['Ant8'] ?? null,
            'Ant9' => $_POST['Ant9'] ?? null,
            'Ant10' => $_POST['Ant10'] ?? null,
            'Ant11' => $_POST['Ant11'] ?? null,
            'Ant12' => $_POST['Ant12'] ?? null,
            'Ant13' => $_POST['Ant13'] ?? null,
            'Ant14' => $_POST['Ant14'] ?? null,
            'Ant15' => $_POST['Ant15'] ?? null,
            'Ant16' => $_POST['Ant16'] ?? null,
            'Ant17' => $_POST['Ant17'] ?? null,
            'Ant18_BD' => $_POST['Ant18_BD'] ?? null,
            'Ant18_BI' => $_POST['Ant18_BI'] ?? null,
            'Ant18_PD' => $_POST['Ant18_PD'] ?? null,
            'Ant18_PI' => $_POST['Ant18_PI'] ?? null,
            'Ant19_BD' => $_POST['Ant19_BD'] ?? null,
            'Ant19_BI' => $_POST['Ant19_BI'] ?? null,
            'Ant19_PD' => $_POST['Ant19_PD'] ?? null,
            'Ant19_PI' => $_POST['Ant19_PI'] ?? null,
            'Ant20' => $_POST['Ant20'] ?? null,
            'Ant21' => $_POST['Ant21'] ?? null
        ];

        if (empty($datos['cod_participante'])) {
            $_SESSION['mensaje'] = "El código del participante es obligatorio";
            $_SESSION['tipo_mensaje'] = "error";
            header('Location: index.php?controller=formValoresAntopo&action=imprimirFormulario');
            exit();
        }

        // Crear modelo y guardar
        $modelo = new formValoresAntopoModel();
        
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

        header('Location: index.php?controller=formValoresAntopo&action=imprimirFormulario');
        exit();
    }
}