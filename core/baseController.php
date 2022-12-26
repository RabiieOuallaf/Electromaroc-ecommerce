<?php 

    /* 
        Load the the models and views 

    */ 


    class BaseController {
        // Load models 

        public function model($model){
            // Require model file 
            require_once "./model/".$model.".php";

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