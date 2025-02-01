    <?php 

    require_once './app/models/RoomsApiModel.php';
    require_once './app/controllers/ApiController.php';

    class RoomsApiController extends ApiController {
        private $model;

        public function __construct() {
            parent::__construct();
            $this->model = new RoomsModel();
        }

        // Obtener todas las habitaciones con ordenamientos
        public function getRooms() {

            $orderBy = isset($_GET['order_by']) ? $_GET['order_by'] : 'id_habitacion';
            $direction = isset($_GET['direction']) && strtoupper($_GET['direction']) === 'DESC' ? 'DESC' : 'ASC'; 
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $itemsPage = isset($_GET['itemspage']) ? (int)$_GET['itemspage'] : 6;
            $all = isset($_GET['all']) ? $_GET['all'] === 'true' : false;

            // "en el paginado el valor de la pagina es negativo o 0 se rompe" 
            // Posible solucion:
            /* if ($page <= 0) {
                $this->view->response(['error' => 'Pagina inválida.'], 400); 
                return;
            }
            if ($itemsPage <= 0) {
                $this->view->response(['error' => 'itemsPage inválido.'], 400); 
                return;
            }
            */
            // Verificación si se puede ordenar
            $validFyelds = ['id_habitacion', 'Nombre', 'Tipo', 'Capacidad', 'Precio'];
            if (!in_array($orderBy, $validFyelds)) {
                $this->view->response(['error' => 'Seleccione un campo valido.'], 400); 
                return;
            }
            // Sino hay paginación
            if ($all) {
                $rooms = $this->model->getRooms($orderBy, $direction);
                $response = [
                    'totalitems' => count($rooms),
                    'rooms' => $rooms
                ];
                $this->view->response($response, 200);
                return;
            }
            $offset = ($page - 1) * $itemsPage;
            $totalRooms = $this->model->getTotalRooms();
            $totalPages = ceil($totalRooms / $itemsPage);
            $rooms = $this->model->getRoomsPaginado($orderBy, $direction, $offset, $itemsPage);

            //Siguiente parte de la solucion:
            /*
            if ($page > $totalPages && $totalRooms > 0) {
                $this->view->response(['error' => 'El número de página no está en las páginas disponibles.'], 404);
                return;
            }
            */

            if ($rooms) {
                $response = [
                    'page' => $page,
                    'itemspage' => $itemsPage,
                    'totalitems' => $totalRooms,
                    'totalpages' => $totalPages,
                    'rooms' => $rooms
                ];
                $this->view->response($response, 200);
            } else {
                $this->view->response(['error' => 'No se han encontrado habitaciones para la página solicitada.'], 404);
            }
        }

        // Obtener una habitación por ID
        public function getRoomById($request) {
            $id_habitacion = $request->params->id;
            if (!is_numeric($id_habitacion) || $id_habitacion <= 0) {
                $this->view->response(['error' => 'ID inválido'], 400);
                return;
            }
            $room = $this->model->getRoomById($id_habitacion);
            if ($room) {
                $this->view->response($room, 200);
            } else {
                $this->view->response(['error' => 'Habitación no encontrada'], 404);
            }
        }
    
        //Creamos una habitacion POST
        public function createRoom($request, $res){
            if(!$res->user) {
                return $this->view->response(['error' =>'No posee los permisos para insertar habitaciones'], 401);
            }
    
            if (empty($request->body->Nombre) || empty($request->body->Tipo) || empty($request->body->Capacidad) || empty($request->body->Precio) || empty($request->body->foto_habitacion)){
                return $this-> view -> response(['error' => 'Falta completar datos'], 400);
            }

            $Nombre = $request->body->Nombre;
            $Tipo = $request->body->Tipo;
            $Capacidad = $request->body->Capacidad; 
            $Precio = $request->body->Precio;
            $foto_habitacion = $request->body->foto_habitacion; 

            // inserto los datos
            $id = $this->model->insertRoom($Nombre, $Tipo, $Capacidad, $Precio, $foto_habitacion);

            if (!$id) {
                return $this->view->response(['error' => 'Error al insertar habitacion'], 500);
            }
            //Devolvemos el recurso recien insertado
            $room = $this->model->getRoomById($id);
            return $this->view->response($room, 201);
        }

        // Actualizar una habitacion PUT
        public function updateRoom($request, $res) {
            if(!$res->user) {
                return $this->view->response(['error' =>'No posee los permisos para editar habitaciones'], 401);
            }
            $id_habitacion = $request->params->id; // ?? null;
            //  put si no paso el id por parametro de ruta me tira una respuesta 200
            /*
            if (!$id_habitacion) {
                    return $this->view->response(['error' => 'ID de la habitación no especificado'], 400);
                }
            */
            if (!isset($request->body->Nombre) || 
                !isset($request->body->Tipo) || 
                !isset($request->body->Capacidad) || 
                !isset($request->body->Precio) || 
                !isset($request->body->foto_habitacion)) {
                    
                return $this->view->response(['error' => 'Falta completar datos'], 400);
            }

            $roomData = [
                'Nombre' => $request->body->Nombre,
                'Tipo' => $request->body->Tipo,
                'Capacidad' => $request->body->Capacidad,
                'Precio' => $request->body->Precio,
                'foto_habitacion' => $request->body->foto_habitacion
            ];

            if ($this->model->updateRoom($id_habitacion, $roomData)) {
                $this->view->response(['success' => 'Habitacion actualizada'], 200);
            } else {
                $this->view->response(['error' => 'Habitacion no encontrada'], 404); 
            }
        }
        
    public function filterRooms(){
        $filter = $_GET['filter'];
        $type = $_GET['type'];

        if($filter == 'Nombre' || $filter == 'Tipo' || $filter == 'Capacidad' || $filter == 'Precio' || $filter == 'foto_habitacion'){
            $date = $this->model->filterRooms($filter,$type);
            $this->view->response($date,200);
        } else{
            $this->view->response(['error' => 'Filtro invalido'],404);
        }
    }
}