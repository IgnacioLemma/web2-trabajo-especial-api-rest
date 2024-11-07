<?php
require_once './libs/ConfigRouter.php';
require_once './app/controllers/RoomsApiController.php';

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
// Endpoint para obtener todas las habitaciones
$router->addRoute('rooms', 'GET', 'RoomsApiController', 'getRooms');
// Endpoint para obtener una habitación por ID
$router->addRoute('room/:id', 'GET', 'RoomsApiController', 'getRoomById');
// Endpoint para crear una habitacion
$router->addRoute('room', 'POST', 'RoomsApiController', 'creatRoom');

// Ejecutar la ruta solicitada
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);