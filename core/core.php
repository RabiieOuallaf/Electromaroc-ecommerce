<?php 

    /* Well , this file creates URL && loads core controller 
        URL Format - /controller/method/params
    */


    class Core {

        protected  $currentController = "Pages";

        protected $currentMethod = "index";

        protected $params = [];


        

        public function __construct()
        {
            // print_r($this->getUrl());

            $url = $this->getUrl();

            if(file_exists('./controller/'.ucwords($url[0]).'.php')){ // ucwrods is a built in function that make the first character of each word capitalized
                
                $this->currentController = ucwords($url[0]);
                // unset the variable value 

                unset($url[0]);

            }

            // now require it 

            require_once './controller/'. $this->currentController . '.php';

            // instantiate it 

            $this->currentController = new $this->currentController;

            // getting the method

            if(isset($url[1])){
                if(method_exists($this->currentController, $url[1])){ // Checking if the current controller have that methode
                    $this->currentMethod = $url[1];

                    // Now unset it 

                    unset($url[1]);
                }
            }


            // Get params 

            $this->params = $url ? array_values($url) : [];

            // Call a callback with array of params 

            call_user_func_array([$this->currentController, $this->currentMethod] , $this->params);
        }

        public function getUrl() 
        {
            if(isset($_GET['url'])){
                
                $url = rtrim($_GET['url'], '/'); // remove / on the right side of url
                $url = filter_var($url, FILTER_SANITIZE_URL); // remove all chatacters that doesn't exist in an url usally 
                $url = explode('/' , $url); // slice the url to an array , it knows where to slice usin '/'
                return $url;
            };
        }

    }

