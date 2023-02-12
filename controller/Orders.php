<?php
    if(file_exists('../core/baseController.php')){
        
        require_once '../core/baseController.php';

    }else {
        require_once 'core/baseController.php';

    }

    if(file_exists('../model/Order.php')){
        
        require_once '../model/Order.php';

    }else {
        require_once 'model/Order.php';

    }
    
    class Orders extends BaseController{
        protected $OrderModel;

        public function __construct() {
            $this->OrderModel = $this->model('Order');
        }

        // Fetch the data 

        public function fetchData(){
            $data = [
                'OrderClientName' => $_POST['clientName']
            ];

            return $data;
        }

        public function addOrder(){
            $orderClientName = $this->fetchData();

            $OrderAdded = $this->OrderModel->addOrder($orderClientName['OrderClientName']);

            if($OrderAdded){
                redirect('/shop');
                return $OrderAdded;
            }else{
                redirect('/cart');
                return false;
            }
        }
    }
    
    $init = new Orders;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
       $init->addOrder();
    }