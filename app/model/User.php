<?php


class User{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Register user
    public function register($data){
        $this->db->query('INSERT INTO users (name , email , pasword) VALUES(:name , :email , :password'); 

        // bind value
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        // execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    // find you by email

    public function findUserByEmail ($email) {
        $this->db -> query('SELECT * FROM users WHERE email =:email');

        // bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // check rows
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
        
    }
}
?>
