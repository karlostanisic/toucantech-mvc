<?php

class Controller {
    
    public function model($model, $db) {
        
        require_once '../app/models/' . $model . '.php';
        return new $model($db);
        
    }
    
    public function view($view, $data = []) {
        require_once '../app/views/' . $view . '.php';
    }
}
