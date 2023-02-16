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
    session_start();
    
    class Orders extends BaseController{
        protected $OrderModel;

        public function __construct() {
            $this->OrderModel = new Order;
        }

        // Fetch the data 
        public function fetchData(){
            $data = [
                'productId' => $_GET['productid'],
                'orderPrice' => $_GET['productprice'],
                'orderQuantity' => $_GET['productprice'], // to scale later 
                'clientid' => (int)$_SESSION['user_id']
            ];

            return $data;
        }


        public function confirmeOrder() { 
            
            $data = $this->fetchData();

            $OrderAdded = $this->OrderModel->confirmeOrder($data);

            
            if($OrderAdded){
                redirect('/dashbaordOrders');
            }else{
                redirect('/dashbaordOrders');

            }

        }

        public function rejectOrder() {

            $orderData = $this->fetchData();
 

            $rejectedOrder = $this->OrderModel->rejectOrder($orderData);

            if($rejectedOrder){
                redirect('/dashbaordOrders');
            }else{
                redirect('/dashbaordOrders');
            }
        }

        public function displayOrdersByParam() {
            
            $onHoldOrders = $this->OrderModel->displayOrdersByParam($_SESSION['user_id']);

            if($onHoldOrders) {
                return $onHoldOrders;
            }else{
                return false;
            }
        }

        public function addOrder() {
            $data = $this->fetchData();
            $addOrder = $this->OrderModel->confirmeOrder($data);

            if($addOrder) {
                return $addOrder;
            }else {
                return false;
            }
        }
                
    }
 
    $init = new Orders;

    if($_SERVER['REQUEST_METHOD'] === 'GET'){

        switch($_GET['type']){
            case 'confirm':          
                $init->confirmeOrder();
                break;
            case 'reject': 
                $init->rejectOrder();
                break;
            default:
                $init->displayOrdersByParam();
                break;
        }

            
        
    }else if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $init->addOrder();
    }