<?php
require_once '../app/models/formInternacionalAFModel.php';


/*
PARA VER LOS COMENTARIOS EXPLICANDO LOGICA, DECISIONES Y CONTROL DEL CODIGO.
Mirar FormCalidadSuenoController.
Hemos dejado solo en ese los comentarios porque era copiar y pegar en los 4 las mismas explicaciones.
*/

class formInternacionalAFController
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
        
        require_once '../app/views/formInternacionalAFView.php';
    }
    public function mandarFormulario()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?controller=formInternacionalAFModel&action=imprimirFormulario');
            exit();
        }

        session_start();
        $datos = [
            'cod_participante' => $_SESSION['cod_participante'],
            'AcF1' => $_POST['AcF1'] ?? null,
            'AcF2' => $_POST['AcF2'] ?? null,
            'AcF3' => $_POST['AcF3'] ?? null,
            'AcF4' => $_POST['AcF4'] ?? null,
            'AcF5' => $_POST['AcF5'] ?? null,
            'AcF6' => $_POST['AcF6'] ?? null,
            'AcF7' => $_POST['AcF7'] ?? null,
        ];

        if (empty($datos['cod_participante'])) {
            $_SESSION['mensaje'] = "El código del participante es obligatorio";
            $_SESSION['tipo_mensaje'] = "error";
            header('Location: index.php?controller=formInternacionalAF&action=imprimirFormulario');
            exit();
        }

        $modelo = new formInternacionalAFModel();
        
        session_start();


        if ($modelo->verificarParticipanteExiste($datos['cod_participante'])) { 
            $_SESSION['mensaje'] = "El participante ya tiene datos registrados";
            $_SESSION['tipo_mensaje'] = "error";
        } else {
            if ($modelo->insertarDatos($datos)) {
                $_SESSION['mensaje'] = "Datos guardados correctamente";
                $_SESSION['tipo_mensaje'] = "exito";
            } else {
                $_SESSION['mensaje'] = "Error al guardar los datos";
                $_SESSION['tipo_mensaje'] = "error";
            }
        }

        header('Location: index.php?controller=formInternacionalAF&action=imprimirFormulario');
        exit();
    }
}