<?php 

    /* Well , this file creates URL && loads core controller 
        URL Format - /controller/method/params
    */

    namespace core;

    class Core {

        protected  $currentController = "pages";

        protected $currentMethod = "index";

        protected $params = [];


        

        public function __construct()
        {
            $this->getUrl();
        }

        public function getUrl() 
        {
            echo $_GET["url"];
        }

    }

