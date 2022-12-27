<?php


    class User {

        private $userModel;

        public function __construct(){

            $this->userModel = new User;
        }

        public function Register(){

            $data = [

                "FName" => $_POST['FName'],
                "Email" => $_POST['Email'],
                "Password" => $_POST['Password']

            ];

            if(empty($data["FName"]) || empty($data["Email"]) || empty($data["Password"])){

                header("location: ../view/register.php");

            }

            
        }

    }