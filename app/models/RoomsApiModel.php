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

    function insertRoom($Nombre, $Tipo, $Capacidad, $Precio, $foto_habitacion, $finished = false){
        $query = $this->db->prepare('INSERT INTO habitaciones (Nombre, Tipo, Capacidad, Precio, foto_habitacion) VALUES (?,?,?,?,?)');
        $query -> execute ([$Nombre, $Tipo, $Capacidad, $Precio, $foto_habitacion]);

        $id = $this->db->lastInsertId();

        return $id;
    }
    
    // Actualizar una habitación
    public function updateRoom($id_habitacion, $roomData) {
        $query = $this->db->prepare("UPDATE habitaciones SET Nombre = :nombre, Tipo = :tipo, Capacidad = :capacidad, Precio = :precio, foto_habitacion = :foto_habitacion WHERE id_habitacion = :id");
    
        $query->bindValue(':nombre', $roomData['Nombre']);
        $query->bindValue(':tipo', $roomData['Tipo']);
        $query->bindValue(':capacidad', $roomData['Capacidad']);
        $query->bindValue(':precio', $roomData['Precio']);
        $query->bindValue(':foto_habitacion', $roomData['foto_habitacion']);
        $query->bindValue(':id', $id_habitacion, PDO::PARAM_INT);
    
        return $query->execute();
    }
}