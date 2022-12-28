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

                if(empty($data["FName"]) || empty($data["Email"]) || empty($data["Password"])){

                    header("location: ../view/register.php");
    
                }

                // Hash password 

                $data['Password'] = password_hash($data['Password'], PASSWORD_DEFAULT);


                if($this->userModel->Register($data)){
                    header("location:".URLROOT."/view/login.php");
                }else{
                    die("Sorry, Something went wrong!");
                }



            }else {
                echo "Sorry , the request method should be a POST";

                $data = [

                    "FName" => '',
                    "Email" => '',
                    "Password" => ''
    
                ];

                $this->view("users/register" , $data);
            }


            
        }


        public function Login(){
            
            // Filtring the data 

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            $data = [

                "Email" => $_POST['Email'],
                "Password" => $_POST['Password']

            ];
                
            // Check if the request method is post 

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                // Filtring the data 

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


                $data = [

                    "Email" => $_POST['Email'],
                    "Password" => $_POST['Password']
    
                ];

                // Handling unwanted cases 

                if( empty($data["Email"]) || empty($data["Password"])){

                    header("location: ../view/index.php");
                    die("Please fill all inputs");
    
                }

                $loggedInUser = $this->userModel->findUserByEmail($data['Email']);

                if($loggedInUser){
                    //Then the user is found :) 
                    $this->userModel->createSession($loggedInUser);
                    
                }else {
                    die("User dose not exsits!");
                }


                if($this->userModel->Login($data['Email'], $data['Password'])){

                    // Create session 
    
                }else{
    
                    die("Sorry, Something went wrong!!");
    
                    

                }

                

            

        }
    }

}

    $init = new Users;

    switch($_POST['type']){

        case 'register':

            $init->Register();
            break;

        case 'login':

            $init->Login();
            break;

    }