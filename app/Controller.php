<?php
abstract class Controller {
    protected $_view;
    
    public function __construct() {
        $this->_view = new View(new Request());
    }
    
    abstract public function index();
    
    protected function loadModel($model) {
        $model .= 'Model';
        $root = ROOT . 'models' . DS . $model . '.php';
        if (is_readable($root)) {
            require_once $root;
            $model = new $model;
            return $model;
        } else {
            throw new Exception('Error in load model. This model is not found.');
        }
    }
    
     protected function loadLibrary($library) {
        $root = ROOT . 'libs' . DS . $library . '.php';
        if (is_readable($root)) {
            require_once $root;
        } else {
            throw new Exception('Error in load library. This library is not found.');
        }
    }
    
    protected function filterInt($int) {
        $int = (int) $int;
        if (is_int($int))
            return $int;
        else 
            return 0;
    }
     
    protected function getSql($key) {
        if (isset($_POST[$key]) && !empty($_POST[$key])) {
            $_POST[$key] = strip_tags($_POST[$key]);
            if (!get_magic_quotes_gpc())
                $_POST[$key] = mysql_real_escape_string($_POST[$key]);
            
            return trim($_POST[$key]);
        }
    }
     
    protected function getInt($key) {
        if (isset($_POST[$key]) && !empty($_POST[$key])) {
            $_POST[$key] = filter_input(INPUT_POST, $key, FILTER_VALIDATE_INT);
            
            return $_POST[$key];
        }
        return 0;
    }
    
    protected function redirect($root = FALSE) {
        if ($root) {
            header('location:' . BASE_URL . $root);
            exit;
        } else {
            header('location:' . BASE_URL);
            exit;
        }
    }
}