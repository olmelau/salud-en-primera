<?php
require_once '../app/models/formDietaMediterraneaModel.php';

/*
PARA VER LOS COMENTARIOS EXPLICANDO LOGICA, DECISIONES Y CONTROL DEL CODIGO.
Mirar FormCalidadSuenoController.
Hemos dejado solo en ese los comentarios porque era copiar y pegar en los 4 las mismas explicaciones.
*/

class formDietaMediterraneaController
{
    public function imprimirFormulario()
    {

        session_start();

        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
            header('Location: index.php?controller=home&action=home');
            exit();
        }
        
        $mensaje = $_SESSION['mensaje'] ?? '';
        $tipo_mensaje = $_SESSION['tipo_mensaje'] ?? '';
        
        
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

        $modelo = new formInternacionalAFModel();
        
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

        header('Location: index.php?controller=formDietaMediterranea&action=imprimirFormulario');
        exit();
    }
}