<?php
class clientModel extends Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function verificationClientCityName($client_city_name) {
        $id = $this->_db->query("SELECT client_city_id FROM client_city WHERE client_city_name ='$client_city_name'");
        if ($id->fetch()) {
            return true;
        }
        return false;
    } /* метод-проверка на одинаковое имя города */
    
     public function getClient() {
        $clients = $this->_db->query("SELECT * FROM client_city");
        return $clients->fetchAll();
    }

    public function getClientById($id) {
        $client = $this->_db->query("SELECT * FROM client_city WHERE client_city_id = $id");
        return $client->fetch();
    }
    
    public function insertClientCity($client_city_name) {
            $this->_db
                    ->prepare("INSERT INTO client_city VALUES(NULL, :client_city_name)")
                    ->execute (array(':client_city_name' => $client_city_name));
    }
    
    public function editClientCity($client_city_id, $client_city_name) {
            $this->_db->prepare(
                        "UPDATE client_city SET client_city_name = :name WHERE client_city_id = :id")
                    ->execute (array(
                        ':id' => $client_city_id,
                        ':name' => $client_city_name));
    }
    
    public function deleteClientCity($client_city_id) {
            $this->_db->prepare("DELETE FROM client_city WHERE client_city_id = :id")
                      ->execute (array(':id' => $client_city_id));
    }
}