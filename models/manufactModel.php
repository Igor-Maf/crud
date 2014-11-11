<?php
class manufactModel extends Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function verificationManufactCityName($manufact_city_name) {
        $id = $this->_db->query("SELECT manufact_city_id FROM manufact_city WHERE manufact_city_name ='$manufact_city_name'");
        if ($id->fetch()) {
            return true;
        }
        return false;
    } /* метод-проверка на одинаковое имя города */
    
    public function getManufact() {
        $manufacts = $this->_db->query("SELECT * FROM manufact_city");
        return $manufacts->fetchAll();
    }
    
    public function getManufactById($id) {
        $manufact = $this->_db->query("SELECT * FROM manufact_city WHERE manufact_city_id = $id");
        return $manufact->fetch();
    }
    
    
    public function insertManufactCity($manufact_city_name) {
            $this->_db
                    ->prepare("INSERT INTO manufact_city VALUES(NULL, :manufact_city_name)")
                    ->execute (array(':manufact_city_name' => $manufact_city_name));
    }
    
    public function editManufactCity($manufact_city_id, $manufact_city_name) {
            $this->_db->prepare(
                        "UPDATE manufact_city SET manufact_city_name = :name WHERE manufact_city_id = :id")
                    ->execute (array(
                        ':id' => $manufact_city_id,
                        ':name' => $manufact_city_name));
    }
    
    public function deleteManufactCity($manufact_city_id) {
            $this->_db->prepare("DELETE FROM manufact_city WHERE manufact_city_id = :id")
                      ->execute (array(':id' => $manufact_city_id));
    }
}