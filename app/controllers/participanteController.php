<?php

class ParticipanteController
{

    public function mostrarPaginaParticipante()
    {
        
        session_start();

        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true || $_SESSION['rol'] !== 'participante') {
            // Comprobamos que un participante no puede acceder a la parte de administrador aunque consiga enviar mediante url los nombres de los controladores y de los metodos correctamente.
            header('Location: index.php?controller=home&action=home');
            //Siempre en caso de que algo no deba estar donde es, sacaremos directamente al login donde se cierra la sesion
            exit();
        }

        require_once '../app/views/participanteView.php';

    }


}


?>