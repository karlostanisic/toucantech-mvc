<?php

class App {
    
    protected $controller = "members";
    
    protected $method = "index";
    
    protected $params = [];
    
    protected $DBconn;


    public function __construct($db) {
        
        $this->DBconn = $db;
        
        $url = $this->parseURL();
        
        if(file_exists('../app/controllers/' . $url[0] . '.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }
        
        require_once '../app/controllers/' . $this->controller . '.php';
        
        $this->controller = new $this->controller($this->DBconn);
        
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        
        $this->params = $url ? array_values($url): [];
        
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    
    protected function parseURL() {
        
        if (isset($_GET['url'])) {
            return EXPLODE('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}