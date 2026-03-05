<?php

class AdminController{

public function mostrarPaginaAdmin(){

session_start();
   
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true || $_SESSION['rol'] !== 'administrador') {
        // Si NO existe o NO es true, rediriges
        header('Location: index.php?controller=home&action=home');
        exit();
    }

require_once '../app/views/adminView.php';



}
}

?>

