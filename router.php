<?php
require_once './libs/ConfigRouter.php';
require_once './app/controllers/RoomsApiController.php';
require_once './app/controllers/UserApiController.php';
require_once './app/middlewares/jwtApiAuth.php';



$router = new Router();
$router->addMiddleware(new jwtApiaAuth());

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
$router->addRoute('rooms', 'POST', 'RoomsApiController', 'createRoom');
// Endpoint para actualizar una habitación por ID
$router->addRoute('rooms/:id', 'PUT', 'RoomsApiController', 'updateRoom');
// Endpoint para filtrar una habitacion por uno de sus campos
$router->addRoute('room', 'GET', 'RoomsApiController', 'filterRooms');
//
$router->addRoute('user/token', 'GET', 'UserApiController', 'getToken');


// Ejecutar la ruta solicitada
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);