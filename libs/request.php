<?php
    class Request {
        public $body = null; # { nombre: 'Saludar', descripcion: 'Saludar a todos' } JSON
        public $params = null; # /api/tareas/:id
        public $query = null; # ?soloFinalizadas=true

        public function __construct() {
            try {
                # file_get_contents('php://input') lee el body de la request
                $this->body = json_decode(file_get_contents('php://input'));
            }
            catch (Exception $e) {
                $this->body = null;
            }
            $this->query = (object) $_GET;
        }
    }
