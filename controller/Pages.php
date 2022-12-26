<?php 

    class Pages extends BaseController{

        public function __construct() {
        }

        public function index() {
            $this->view("index");
        }
    }