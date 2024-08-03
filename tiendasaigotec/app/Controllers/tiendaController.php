<?php

namespace App\Controllers;
use Core\routing\Controller;
use Core\view\View;

class TiendaController extends Controller {

    public function listarUsuarios(){
        echo 'Listando usuarios';
    }

    public function crearUsuario(){
        echo 'Creando usuario';
    }

    public function reporte(){
        // retornar un archivo de vista
        $view = new View();
        return $view->render("usuarios");
    }
}