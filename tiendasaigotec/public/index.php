<?php

use Core\foundation\application;

# Traer el contenido del archivo core/foundation/application.php
$base_dir = dirname(__DIR__);
# PSR-4: autoloading
require $base_dir . "/vendor/autoload.php";

# vamos a crear un objeto de la clase aplicación
$app = new Application($base_dir);
$app -> router -> get("/productos/listar", [\App\Controllers\tiendaController::class, "ListarUsuarios"]);
$app -> router -> get("/productos/reportes", "Retornar reportes");
$app -> router -> get("/usuarios/modificar", "Retornar usuarios");
$app -> router -> get("/usuarios/reporte", [\App\Controllers\tiendaController::class, "reporte"]);

$app->run();

?>