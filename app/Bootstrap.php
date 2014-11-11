<?php
class Bootstrap {
    public static function run(Request $r) {
        $controladdor = $r->getController() . 'Controller';
        $rootControladdor = ROOT . 'controllers' . DS . $controladdor . '.php';
        $method = $r->getMethod();
        $args = $r->getArgs();
        
        if (is_readable($rootControladdor)) {
            require_once $rootControladdor;
            $controladdor = new $controladdor;
            
            if (is_callable(array($controladdor, $method))) {
                $method = $r->getMethod();
            } else {
                $method = 'index';
            }
            
            if (isset($args)) {
                call_user_func_array(array($controladdor, $method), $args);
            } else {
                call_user_func(array($controladdor, $method));
            }
        } else {
            throw new Exception('Controladdor is not readable. Error 404.');
        }
    }
}
