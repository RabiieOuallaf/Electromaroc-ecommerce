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
        public function addCategory(){
            $this->view('addCategory');
        }
        public function dashbaordCategory(){
            $this->view('dashbaordCategory');
        }
        public function dashbaord(){
            $this->view('dashbaord');
        }
        public function addProduct(){
            $this->view('addProduct');
        }
        public function updateProduct(){
            $this->view('updateProduct');
        }
        public function updateCategory(){
            $this->view('updateCategory');
        }
        public function computers() {
            $this->view('computersCategory');
        }
        public function gaming(){
            $this->view('gamingCategory');
        }
        public function headphone(){
            $this->view('headphoneCategory');
        }
        public function ipad(){
            $this->view('ipadCategory');
        }
        public function mentor(){
            $this->view('mentorCategory');
        }
        public function phone(){
            $this->view('phoneCategory');
        }
        public function shop(){
            $this->view('shop');
        }
        public function cart(){
            $this->view('cart');
        }
        public function dashbaordOrders(){
            $this->view('dashbaordOrders');
        }
        public function displayProduct(){
            $this->view('displayProduct');
        }
        public function dashbaordUsers(){
            $this->view('dashbaordUsers');
        }
        public function dashbaordOrdersGroup(){
            $this->view('dashbaordOrdersGroup');
        }
        public function shop2(){
            $this->view('shop2');
        }

    }