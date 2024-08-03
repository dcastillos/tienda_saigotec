<?php
namespace Core\foundation;
use Core\routing\Router;
/* La clase application se encarga de llamar a todos los componentes
- Router
- DB
- Views
- Servidor de correo */

class Application {
    public Router $router;
    public static string $base_dir;

    public function __construct($base_dir){
        $this->router = new Router();
        self::$base_dir = $base_dir;
    }

    public function run(){
        echo $this->router->compare();
    }
}