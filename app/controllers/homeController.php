<?php

session_start();

/**
 * La lógica de homeController es simplemente imprimir la vista sin acceso a la web.
 * Y dentro de esa vista está el formulario de Login que llamará a loginController cuando se envie.
 * Y ya se encarga login de hacer la lógica y comrpobaciones.
 */
class homeController
{
    public function home()
    {
        require_once '../app/views/homeView.php';
    }

    
    
}
