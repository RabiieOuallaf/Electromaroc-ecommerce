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
            $this->OrderModel = new Order;
        }

        // Fetch the data 
        public function fetchId(){
            $data = [
                'orderId' => $_GET['productid'],
                'orderPrice' => $_GET['poductprice'],
                'orderQuantity' => $_GET['productprice'] // to scale later 
            ];
            return $data;
        }


        public function addOrder(){ 
            
            $data = $this->fetchId();
            
            
            $OrderAdded = $this->OrderModel->addOrder($data);
            var_dump("fofofoof");
            if($OrderAdded){
                redirect('/cart');
                return $OrderAdded;
            }else{
                redirect('/shop');
                return false;
            }

        }
                
    }
            
         
        
    
    
    $init = new Orders;

    if($_SERVER['REQUEST_METHOD'] === 'GET'){

        switch($_GET['type']){
            case 'confirm': 
                
                $init->addOrder();
                break;
            default:
                break;
        }

            
        
    }