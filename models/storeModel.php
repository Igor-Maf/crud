<?php
class storeModel extends Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function verificationStoreName($store_name) {
        $id = $this->_db->query("SELECT store_id FROM store WHERE store_name ='$store_name'");
        if ($id->fetch()) {
            return true;
        }
        return false;
    }

    public function getStores() {
        $stores = $this->_db->query("SELECT * FROM store");
        return $stores->fetchAll();
    }
    
    public function getStoreById($id) {
        $store_by_id = $this->_db->query("SELECT * FROM store WHERE store_id = $id");
        return $store_by_id->fetch();
    }
    
    public function getStoreContCount($id) {
        $cont_by_store = $this->_db->query("SELECT COUNT(cont_id) AS count FROM cont WHERE store_id = $id");
        $count_arr = $cont_by_store->fetch();
        if ($count_arr["count"]) return true;
    }
    
    public function insertStore($store_name) {
            $this->_db
                    ->prepare("INSERT INTO store VALUES(NULL, :store_name)")
                    ->execute (array(':store_name' => $store_name));
    }
    
    public function editStore($store_id, $store_name) {
            $this->_db->prepare(
                        "UPDATE store SET store_name = :name WHERE store_id = :id")
                    ->execute (array(
                        ':id' => $store_id,
                        ':name' => $store_name));
    }
    
    public function deleteStore($store_id) {
            $this->_db->prepare("DELETE FROM store WHERE store_id = :id")
                      ->execute (array(':id' => $store_id));
    }
}