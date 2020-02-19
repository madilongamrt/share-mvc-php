<?php

class Users extends Controller{

    public function __construct() {
        
    }

    // register fuction
    public function register() {
        
        // check for posts
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Process form
           // die('submitted');

            // sanitize Post data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_ADD_SLASHES);

            // init data
            $data =[
                'name' => trim($_POST['name']),
                'email' =>  trim($_POST['email']),
                'password' =>  trim($_POST['password']),
                'confirm_password' =>  trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
               ];

               // validate email
               if(empty($data['email'])) {
                   $data['email_err'] = 'Please enter email';
               }

               // validate name
               if(empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

              // validate password
              if(empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif(strlen($data['password']) < 6) {
                $data['password_err'] = 'password must be at least 6 characters';
            }

            // validate name
            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            }else {
                if($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'password do not match';
                }
            }

            // make sure error are empty
            if( empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // validated
                die('SUCCESS');
            } else {
                // load view errors
                $this->view('users/register', $data);
            }


        } else{
           // init data
           $data =[
            'name' =>' ',
            'email' => '',
            'password' => '',
            'confirm_password' => '',
            'name_err' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => '',
           ];

           // load view
           $this->view('users/register',$data);
          
        }
    }

    // login function
    public function login() {
        
        // check for posts
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
             // sanitize Post data
             $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_ADD_SLASHES);

              // init data
            $data =[
                'email' =>  trim($_POST['email']),
                'password' =>  trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
               ];

               // validate email
               if(empty($data['email'])) {
                   $data['email_err'] = 'Please enter email';
               }

               // validate password
               if(empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // make sure error are empty
            if(empty($data['email_err']) && empty($data['password_err'])) {
                // validated
                die('SUCCESS');
            } else {
                // load view errors
                $this->view('users/login', $data);
            }

            // Process form

        } else{
           // init data
           $data =[
          
            'email' => '',
            'password' => '',
            'email_err' => '',
            'password_err' => '',
           ];

           // load view
           $this->view('users/login',$data);
          
        }
    }
}
?>