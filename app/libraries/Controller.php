<?php

//echo 'Hello world';

/*
 Base Controller
 Load the models and view
*/
class Controller {
    
    // Load model
    public function model($model) {
    // require model file
        
        require_once '../app/model/' .$model . '.php';
        
        // instatiate model
        
        return new $model;
    }
    
    // load view
    public function view($view, $data = []) {
        // check for view file
        if(file_exists('../app/view/'.$view.'.php')) {
            require_once '../app/view/'.$view .'.php';
        } else {
            // view does not exist
            die('View does not exits');
        }
    }
}

?>