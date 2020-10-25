<? php
// models/Clientes.php

class Clientes {
    private $db;
    public function __consturct(){
        $this-> db = Database::getInstance();

    }
    public function getTodos(){

        this->db->query("SELECT * FROM cliente");
        return $this->db->fetchAll();
    }

}