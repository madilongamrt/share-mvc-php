<?php


class User{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // find you by email

    public function findUserByEmail ($email) {
        $this->db -> query('SELECT * FROM users WHERE email =:email');

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
