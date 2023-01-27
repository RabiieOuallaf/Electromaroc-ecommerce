<?php 

    require './core/BaseController.php';

    class Pages extends BaseController{

        
        public function index() {
            $this->view('index');
        }
        public function register(){
            $this->view('register');
        }
        public function login(){
            $this->view('login');
        }
        public function dashbaord(){
            $this->view("dashbaord");
        }
        public function computersCategory() {
            $this->view('computersCategory');
        }
        public function gamingCategory(){
            $this->view('gamingCategory');
        }
        public function headphoneCategory(){
            $this->view('headphoneCategory');
        }
        public function ipadCategory(){
            $this->view('ipadCategory');
        }
        public function mentorCategory(){
            $this->view('mentorCategory');
        }
        public function phoneCategory(){
            $this->view('phoneCategory');
        }

    }