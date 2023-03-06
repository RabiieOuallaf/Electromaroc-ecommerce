<?php 

    if(file_exists("../core/database.php")){
        require_once '../core/database.php';
        require_once '../config/config.php';
        require_once '../helpers/url_helpers.php';
        require_once "../core/database.php";
    }else {
        require_once 'core/database.php';
        require_once 'config/config.php';
        require_once 'helpers/url_helpers.php';
        require_once "core/database.php";
    } 

    class User {

        protected $db;

        public function __construct(){
            $this->db = new Database;
        }

        // Register 

        public function register($data){

            $this->db->query('INSERT INTO users(user_username,user_password,user_email) VALUES (:username,:password,:email)');

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

        public function Login($email, $password){

            $sql = 'SELECT * FROM users WHERE user_email = :email AND user_password = :password';
            $this->db->query($sql);
            $this->db->bind(':email', $email);
            $this->db->bind(':password', $password);

            
            $row = $this->db->single();
            
    
            if($row) {
                $user_password = $row->user_password;

                if($password = $user_password){
                    return $row;
                } else {
                    return false;
                }
            }else {
                return false;
            }

            
        }


        // Find user by email 

        public function findUserByEmail($email) {

            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            // Check rows 

            if($this->db->rowCount() > 0){

                return $row;

            }else {
                return false;
            }
        }

        public function displayUsers() {
            $sql = $this->db->query('SELECT * FROM users'); 
            $users = $this->db->multipleNoStatement($sql);
            
            if($users) {
                return $users;
            }else{
                return false;
            }
        }

    }