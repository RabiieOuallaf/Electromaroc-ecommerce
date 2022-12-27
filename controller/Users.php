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

                if(empty($data["FName"]) || empty($data["Email"]) || empty($data["Password"])){

                    header("location: ../view/register.php");
    
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

    }