<?php

require_once './app/models/HostelApiModel.php';
class UserApiModel extends HostelApiModel {

    public function getUserByEmail($email) {    
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
