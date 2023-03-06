<?php

    if(file_exists("../core/baseController.php")){ 
        require_once "../core/baseController.php";
    }else {
        require_once "core/baseController.php";
    }

    if(file_exists("../model/User.php")){   
        require_once "../model/User.php";
    }else {

        require_once "model/User.php";
    }

    class Users extends BaseController{

        public $userModel;

        public function __construct(){

            $this->userModel = $this->model('User');
            
        }

        public function Register(){

                $data = [
                    'FName' => $_POST['FName'],
                    'Email' => $_POST['Email'],
                    'Password' => $_POST['Password']
                ];
                
                // Handling unwanted cases 
                if(empty($data['FName'] || $data['Email'] || $data['Password'] )){
                    redirect('/register');
                    echo 'Please fill out all inputs';
                }
                // Hash password 

                if($this->userModel->Register($data)){
                    redirect('/login');
                }else{
                    die('Sorry, Something went wrong! Please make sure from your account informations');
                }
            
        }


        public function Login(){

            $data = [

                'Email' => $_POST['Email'],
                'Password' => $_POST['Password']

            ];

            // Check if the request method is post 
            $data = [

                'Email' => $_POST['Email'],
                'Password' => $_POST['Password']

            ];
            // Handling unwanted cases 

            if(empty($data['Email'] || $data['Password'])){
                redirect('/index');
                die('Please fill all inputs');
            }

            $loggedInUser = $this->userModel->Login($data['Email'], $data['Password']);

            // Create session 

            if($loggedInUser){
                $this->createSession($loggedInUser);       
            }else {
                die('Sorry, Something went wrong! Please make sure from your account informations');

            }         

        

        

        
    }

    public function findUserByEmail($userEmail){
        $userFound = $this->userModel->findUserByEmail($userEmail);

        if($userFound){
            return $userFound;
        }else{
            return false;
        }
    }



    public function createSession($user){
        
        session_start();
        
        $_SESSION['user_email'] = $user->user_email;
        $_SESSION['user_name'] = $user->user_username;
        $_SESSION['user_id'] = $user->user_id;

        if($user->role == 'admin'){
            $_SESSION['user_role'] = $user->role;
            redirect('/dashbaord');
        }else if($user->role == 'client'){
            redirect('/index');
        }

    }

    public function destroySession(){
        session_start();
        session_unset();
        session_destroy();

        redirect('/index');
      
    }

    public function DisplayUsers() {
        $users = $this->userModel->displayUsers();
        if($users) {
            return $users;
        }else {
            echo "There's no users!";
        }
    }

}

    $init = new Users;

    if($_SERVER['REQUEST_METHOD'] === 'POST')

        switch($_POST['type']){
            case 'register':
                $init->Register();
                break;
            case 'login':
                $init->Login();
                break;
            default: 
                break;
    }else {
        $init->destroySession();
    }