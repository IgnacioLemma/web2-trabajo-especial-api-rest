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

            // Verificación si se puede ordenar
            $validFyelds = ['id_habitacion', 'Nombre', 'Tipo', 'Capacidad', 'Precio'];
            if (!in_array($orderBy, $validFyelds)) {
                $this->view->response(['error' => 'Seleccione un campo valido.'], 400); 
                return;
            }

            $rooms = $this->model->getRooms($orderBy, $direction);
            if ($rooms) {
                $this->view->response($rooms, 200); 
            } else {
                $this->view->response(['error' => 'No se han encontrado habitaciones.'], 404); 
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
}