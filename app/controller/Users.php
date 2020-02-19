<?php

class Users extends Controller{

    public function __construct() {
        
    }

    public function register() {
        
        // check for posts
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Process form
        } else{
           // init data
           $data =[
            'name' =>' ',
            'email' => '',
            'password' => '',
            'confirm_password' => '',
            'name_error' => '',
            'email_error' => '',
            'password_error' => '',
            'confirm_password_error' => '',
           ];

           // load view
           $this->view('users/register',$data);
          
        }
    }
}
?>