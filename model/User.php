<?php 

    require_once '../core/Database.php';
    require_once '../config/config.php';

    class User {

        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        // Register 

        public function register($data){
            $this->db->query('INSERT INTO users (username ,password ,email) VALUES (:username, :password, :email)');

            $this->db->bind(':username' , $data['FName']);
            $this->db->bind(':password', $data['Password']);
            $this->db->bind(':email', $data['Email']);

            // Execute 

            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }

        public function login($data){}

        // Find user by email 

        public function findUserByEmail($email) {
            $sql = "SELECT * FROM users WHERE email = :email";
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            // Check rows 

            if($this->db->rowCount() > 0){
                return true;
            }else {
                return false;
            }
        }

    }