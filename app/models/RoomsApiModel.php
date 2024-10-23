<?php

require_once './app/models/HostelApiModel.php';

class RoomsModel extends HostelApiModel {

// Obtener todas las habitaciones y el ordenamiento
    function getRooms($order, $direction) {
        $query = $this->db->prepare("SELECT * FROM habitaciones ORDER BY $order $direction");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}