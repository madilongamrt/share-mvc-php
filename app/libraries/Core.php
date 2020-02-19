<?php

/*
    App core class
    create URL & loads core controller
    format /controller/method/params
*/

class Core {
    
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];
    
    public function __construct() { 
        
        // print_r( $this->getUrl() );
        
        $url = $this->getUrl();
        
        // look for controller for first value
        
        if(file_exists('../app/controller/' . ucwords($url[0]) .'.php')) {
            // if it exist set as controllers
            $this->currentController = ucwords($url[0]);
            
            // unset 0 index
            unset($url[0]);
        }
        
        // requre the controller
        
        require_once '../app/controller/' . $this->currentController . '.php';
        
           
        
        // instantiate controller class
        
        $this->currentController = new $this->currentController;
        
        // check for second part of url
        
        if(isset($url[1])) {
            // check to se if method exists in controller
            if(method_exists($this->currentController, $url[1])) {
                $this->currentMethod= $url[1];
                
                // Unset index
                unset($url[1]);
            }
        }
        //echo $this->currentMethod;
        
         // Get params
    $this->params = $url ? array_values($url) :[];
    
    // call a callback
    call_user_func_array([$this->currentController, $this->currentMethod],$this->params);
        
    }
    
    
   
    
    // 
    
    public function getUrl() {
        
        // echo $_GET['url'];
        if(isset($_GET['url'])) {
            
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            
            return $url;
        }
    }
}

// echo 'Hello core';

?>