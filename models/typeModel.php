<?php
class TypeModel extends Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function verificationTypeName($type_cont_name) {
        $id = $this->_db->query("SELECT type_cont_id FROM type_cont WHERE type_cont_name ='$type_cont_name'");
        if ($id->fetch()) {
            return true;
        }
        return false;
    } /* метод-проверка на одинаковое имя типа контейнера */
    
    public function getTypeConts() {
        $type_conts = $this->_db->query("SELECT * FROM type_cont");
        return $type_conts->fetchAll();
    }
    
    public function getTypeContById($id) {
        $type_cont = $this->_db->query("SELECT * FROM type_cont WHERE type_cont_id = $id");
        return $type_cont->fetch();
    }

    public function insertTypeCont($type_cont_name) {
            $this->_db
                    ->prepare("INSERT INTO type_cont VALUES(NULL, :type_cont_name)")
                    ->execute (array(':type_cont_name' => $type_cont_name));
    }
    
    public function editType($type_cont_id, $type_cont_name) {
            $this->_db->prepare(
                        "UPDATE type_cont SET type_cont_name = :name WHERE type_cont_id = :id")
                    ->execute (array(
                        ':id' => $type_cont_id,
                        ':name' => $type_cont_name));
    }
    
    public function deleteType($type_cont_id) {
            $this->_db->prepare("DELETE FROM type_cont WHERE type_cont_id = :id")
                      ->execute (array(':id' => $type_cont_id));
    }
}
