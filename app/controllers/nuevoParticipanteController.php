<?php

require_once "../app/models/nuevoParticipanteModel.php";

class NuevoParticipanteController
{

    public function imprimirNuevoParticipante()
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

        require_once '../app/views/nuevoParticipanteView.php';
    }
    public function nuevoParticipante()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?controller=nuevoparticipante&action=imprimirNuevoParticipante');
            exit();
        }

        // Recoger datos del formulario de forma simple
        $datosParticipante = [
            'cod_participante' => $_POST['cod_participante'] ?? null,
            'centro_educativo' => $_POST['centro_educativo'] ?? null,
            'familia_profesional' => $_POST['familia_profesional'] ?? null,
            'edad' => $_POST['edad'] ?? null,
            'sexo' => $_POST['sexo'] ?? null
        ];

        if (empty($datosParticipante['cod_participante'])) {
            $_SESSION['mensaje'] = "El código del participante es obligatorio";
            $_SESSION['tipo_mensaje'] = "error";
            header('Location: index.php?controller=nuevoParticipante&action=imprimirNuevoParticipante');
            exit();
        }

        // Crear modelo y guardar
        $modelo = new NuevoParticipanteModel();

        session_start();


        if ($modelo->verificarParticipanteExiste($datosParticipante['cod_participante'])) {
            $_SESSION['mensaje'] = "El participante ya tiene datos registrados";
            $_SESSION['tipo_mensaje'] = "error";
        } else {
            // Si no existe, insertar los datos
            if ($modelo->insertarNuevoParticipante($datosParticipante)) {
                $_SESSION['mensaje'] = "Datos guardados correctamente";
                $_SESSION['tipo_mensaje'] = "exito";
            } else {
                $_SESSION['mensaje'] = "Error al guardar los datos";
                $_SESSION['tipo_mensaje'] = "error";
            }
        }

        header('Location: index.php?controller=nuevoParticipante&action=imprimirNuevoParticipante');
        exit();
    }

}





?>