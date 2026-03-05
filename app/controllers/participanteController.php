<?php

class ParticipanteController
{

    public function mostrarPaginaParticipante()
    {
        //hay que meter el session_start en cada controlador
        session_start();

        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true || $_SESSION['rol'] !== 'participante') {
            // Si NO existe o NO es true, rediriges
            header('Location: index.php?controller=home&action=home');
            exit();
        }

        require_once '../app/views/participanteView.php';

    }


}


?>