<?php
require_once './libs/ConfigRouter.php';

$router = new Router();

/*
$router->addRoute(URL, VERB, CONTROLLER, METHOD)
$router: Variable del ConfigRouter que gestiona las rutas.
addRoute: Función principal para añadir rutas.
URL: La URL a la que se accede.
VERB: El verbo HTTP para la función (GET, POST, PUT, DELETE, etc.).
CONTROLLER: Nombre del controlador a llamar.
METHOD: Nombre de la función del controlador que ejecutará la tarea.
*/