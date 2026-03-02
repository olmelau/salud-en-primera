<?php
class controladorGeneral
{

    public function home()
    {
        // Incluir la vista y pasar los datos
        require_once '../app/views/home.php';
    }

    //Método para mostrar el historial de préstamos.

    public function inicioSesion() {}
}
