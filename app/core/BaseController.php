<?php 

    /* 
        Load the the models and views 

    */ 


    class BaseController {
        // Load models 

        public function model($model){
            // Check if the file exists and Require it 
            if(file_exists("../model/".$model.".php")){

                require_once "../model/".$model.".php";

            }else if(file_exists("model/".$model.".php")){

                require_once "model/".$model.".php";
                
            }else {
                die("model does not exsit!");
            }
            
            // Instaitate model 
            return new $model();
        }

        // Load view 

        public function view($view, $data = []){ // $data to be able to pass the data from the controller 
            // Check if file exsits 

            if(file_exists("./view/".$view.".php")){

                require_once "./view/".$view.".php";

            }else {
                die("View does not exsit!");
            }
        }
    }

    