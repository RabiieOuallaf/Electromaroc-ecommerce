<?php 

    /* Well , this file creates URL && loads core controller 
        URL Format - /controller/method/params
    */

    namespace core;

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

