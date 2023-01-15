<?php 

    i

    class Pages extends BaseController{

        public function __construct() {
            
        }

        public function index() {
            $this->view("index");
        }
        public function register(){
            $this->view("register");
        }
        public function computersCategory() {
            $this->view('computersCategory');
        }

    }