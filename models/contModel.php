<?php
class contModel extends Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function getContTypes() {
        $types_cont = $this->_db->query("SELECT * FROM type_cont");
        return $types_cont->fetchAll();
    }
    
    public function getStores() {
        $stores = $this->_db->query("SELECT * FROM store");
        return $stores->fetchAll();
    }
    
    public function getManufactCityes() {
        $manufact_cityes = $this->_db->query("SELECT * FROM manufact_city");
        return $manufact_cityes->fetchAll();
    }
    
    public function getClientCityes() {
        $client_cityes = $this->_db->query("SELECT * FROM client_city");
        return $client_cityes->fetchAll();
    }
    
    public function getCont() {
        $cont = $this->_db->query("SELECT "
                . "c.*, "
                . "t.type_cont_name, "
                . "s.store_name, "
                . "m.manufact_city_name, "
                . "cl.client_city_name "
                . "FROM "
                . "cont AS c, "
                . "type_cont AS t, "
                . "store AS s, "
                . "manufact_city AS m, "
                . "client_city AS cl "
                . " WHERE "
                . "c.type_cont_id = t.type_cont_id AND "
                . "c.store_id = s.store_id AND "
                . "c.manufact_city_id = m.manufact_city_id AND "
                . "c.client_city_id = cl.client_city_id "
                . "ORDER BY c.cont_id DESC");
        
        return $cont->fetchAll();
    }
    
    public function getContById($id) {
        $cont_by_id = $this->_db->query("SELECT * FROM cont WHERE cont_id = $id");
        return $cont_by_id->fetch();
    }
    
    public function verificationContCode($cont_code) {
        $id = $this->_db->query("SELECT cont_id FROM cont WHERE cont_code ='$cont_code'");
        if ($id->fetch()) {
            return true;
        }
        return false;
    } /* метод-проверка на одинаковый "код" контейнера */

    public function insertCont(
        $cont_code,
        $type_cont,
        $cont_weight, 
        $manufact_city,
        $client_city,
        $date_start,
        $date_end,
        $store) {
            $this->_db->prepare(
                        "INSERT INTO cont VALUES("
                        . "NULL,"
                        . ":cont_code,"
                        . ":type_cont,"
                        . ":cont_weight,"
                        . ":manufact_city,"
                        . ":client_city,"
                        . ":date_start,"
                        . ":date_end,"
                        . ":store)")
                    ->execute (array(
                        ':cont_code' => $cont_code,
                        ':type_cont' => $type_cont,
                        ':cont_weight' => $cont_weight,
                        ':manufact_city' => $manufact_city,
                        ':client_city' => $client_city,
                        ':date_start' => $date_start,
                        ':date_end' => $date_end,
                        ':store' => $store));
    }
    
    public function editCont($cont_id, $cont_code, $type_cont_id, $cont_weight, $store, $manufact_city, $client_city, $date_start, $date_end) {
            $this->_db->prepare(
                        "UPDATE cont SET "
                        . "cont_code = :code, "
                        . "type_cont_id = :type_cont_id, "
                        . "cont_weight = :weight, "
                        . "store_id = :store, "
                        . "manufact_city_id = :manufact_city, "
                        . "client_city_id = :client_city, "
                        . "date_start = :start, "
                        . "date_end = :end "
                    . "WHERE cont_id = :id")
                    ->execute (array(
                        ':id' => $cont_id,
                        ':code' => $cont_code,
                        ':type_cont_id' => $type_cont_id,
                        ':weight' => $cont_weight,
                        ':store' => $store,
                        ':manufact_city' => $manufact_city,
                        ':client_city' => $client_city,
                        ':start' => $date_start,
                        ':end' => $date_end));
    }
    
    public function deleteCont($cont_id) {
            $this->_db->prepare("DELETE FROM cont WHERE cont_id = :id")
                       ->execute (array(':id' => $cont_id));
    }  
}