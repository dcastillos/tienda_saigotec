<?php
namespace Core\routing;
use Core\http\Request;

class Router{

    protected array $routes = [];

    public function get($url, $action){
        $this -> routes["GET"][] = [
            "url" => $url,
            "action" => $action
        ];
    }

    public function post($url, $action){
        $this -> routes["POST"][] = [
            "url" => $url,
            "action" => $action
        ];
    }

    public function compare(){
        //capturando la petición
        $request = Request::createFromGlobals();

        //obtener el método HTTP
        $metodoHttp = $request->getMethod();

        //obtener la URL
        $url = $request->getPathInfo();

        //comparar
        $rutas = $this->routes[$metodoHttp];

        $action = false;
        $parametros = [];

        foreach($rutas as $ruta) {
            if ($ruta["url"] == $url){
                $action = $ruta["action"];
                break;
            }
        }

        if($action === false) {
            return "Ruta no encontradas";
        }
        
        $claseController = $action[0];
        $metodoController = $action[1];

        $objetoController = new $claseController();

        return call_user_func_array([$objetoController, $metodoController], []);
    }
}