<?php

    require_once '../core/BaseController.php';


    class Users extends BaseController{

        private $userModel;

        public function __construct(){

            $this->userModel = $this->model('User');
        }

        public function Register(){

            // Check if the request method is post 

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                // Filtring the data 

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


                $data = [

                    "FName" => $_POST['FName'],
                    "Email" => $_POST['Email'],
                    "Password" => $_POST['Password']
    
                ];

                // Handling unwanted cases 

                if(empty($data["FName"] || $data["Email"] || $data["Password"] )){
                    
                    redirect("/register");
                    echo "Please fill out all inputs";
    
                }
                // Hash password 

                $data['Password'] = password_hash($data['Password'], PASSWORD_DEFAULT);

                if($this->userModel->Register($data)){
                    redirect("/login");
                }else{
                    die("Sorry, Something went wrong! Please make sure from your account informations");
                }


            }else {

                echo "Sorry , the request method should be a POST";

                $data = [

                    "FName" => '',
                    "Email" => '',
                    "Password" => ''
    
                ];

                redirect("/register");
            }


            
        }


        public function Login(){
            



            $data = [

                "Email" => $_POST['Email'],
                "Password" => $_POST['Password']

            ];

                
            // Check if the request method is post 

            if($_SERVER['REQUEST_METHOD'] == 'POST'){



                $data = [

                    "Email" => $_POST['Email'],
                    "Password" => $_POST['Password']
    
                ];

                // Handling unwanted cases 

                if(empty($data["Email"] || $data["Password"])){

                    redirect("/index");
                    die("Please fill all inputs");
    
                }

                $loggedInUser = $this->userModel->Login($data['Email'], $data['Password']);

                // Create session 

                if($loggedInUser){
                    $this->createSession($loggedInUser);       
                }else {
                    die("User dose not exsits!");
                }         

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

        if($user->role == "admin"){
            $_SESSION['user_role'] = $user->role;
            redirect("/dashbaord");
        }else if($user->role == "client"){
            redirect("/index");
        }

        exit();
    }

    public function destroySession(){
        session_start();
        session_unset();
        session_destroy();

        redirect("/index");
      
    }

}

    $init = new Users;

    if($_SERVER["REQUEST_METHOD"] == "POST")

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