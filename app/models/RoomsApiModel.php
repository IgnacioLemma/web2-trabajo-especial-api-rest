<?php

require_once './app/models/HostelApiModel.php';

class RoomsModel extends HostelApiModel {

// Obtener todas las habitaciones y el ordenamiento
    function getRooms($orderBy, $direction) {
        $query = $this->db->prepare("SELECT * FROM habitaciones ORDER BY $orderBy $direction");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // obtener las habitaciones por Id
    function getRoomById($id_habitacion) {
        $query = $this->db->prepare('SELECT * FROM habitaciones WHERE id_habitacion = :id');
        $query->bindParam(':id', $id_habitacion); //para evitar inyecciones sql
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
}