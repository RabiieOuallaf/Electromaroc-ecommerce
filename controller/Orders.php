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
                // 'productId' => $_GET['productid'],
                // 'orderPrice' => $_GET['productprice'],
                // 'orderQuantity' => $_GET['productquantity'], // to scale later 
                'clientid' => (int)$_SESSION['user_id'],
                'orderid' => (int)$_GET['orderid']
            ];

            return $data;
        }

        public function fetchPostData() { // used only for posting the orders data in the DB
            $count = count($_POST['productName']);
            $orderId = 0;
            $productsData = array();
            
            
            for($i = 0; $i < $count; $i++) {
                $data = [
                    // products data
                    'productName' => $_POST['productName'][$i],
                    'productDescription' => $_POST['productDescription'][$i],
                    'productPrice' => (int)$_POST['productPrice'][$i],
                    'productId' => (int)$_POST['productId'][$i],
                    'productQuantity' => (int)$_POST['productQuantity'][$i]  ,
                    // client data
                    'clientName' => $_POST['clientName'],
                    'phoneNumber' => (int)$_POST['phoneNumber'],
                    'email' => $_POST['email'],
                    'city' => $_POST['city'],
                    'adress' => $_POST['adress'],
                ];
                $productsData[] = $data;
                
            }
            
            return $productsData;

            

        }


        public function confirmeOrderStatus() { 
            
            $data = $this->fetchData();
            
            $OrderAdded = $this->OrderModel->confirmeOrderStatus($data);


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

        public function displayOrdersByParam() { // display order by param (i use the session to get the user's id )
            
            $ClientOrders = $this->OrderModel->displayOrdersByParam($_SESSION['user_id']);

            if($ClientOrders) {
                return $ClientOrders;
            }else{
                return false;
            }
        }

        // public function displayOrders() {
        //     $total = 0;
        //     $orders = $this->displayOrdersByParam();

        //     $data = array();

        //     foreach($orders as $order) {
        //         $orderProducts = 
        //     }

        // }
        // add  client data to the data base 
        public function addClientData() {
            $data = $this->fetchPostData();
            
            $addClientData = $this->OrderModel->addClientData($data[0]);

            if($addClientData ) {
                return $addClientData;
            }else {
                return false;
            }

        
        }
        // add order to data base with onhold status
        public function addOrder() {

            $productsData = $this->fetchPostData();
            if(!empty($productsData['productName']) || !is_null($productsData) && !empty($productsData['productDescription']) && !empty($productsData['productPrice']) && !empty($productsData['productId']) && !empty($productsData['productQuantity'])){
                $countProduct = count($productsData);

                for($i = 0; $i < $countProduct; $i++) {
                    
                    $addOrder = $this->OrderModel->addOrder($productsData[$i]);
                }

                // $addOrder = $this->OrderModel->addOrder($data);
                $addedClientData = $this->addClientData();
                if($addOrder && $addedClientData) {
                    redirect('/cart');
                    
                }else {
                    redirect('/cart');
                }
            }else{
                die('add a product to the cart first');
            }
        }

        // add client data to the data base 

        



        public function displayOrdersByStatus($orderStatus) {

            $onHoldOrders = $this->OrderModel->displayOrdersByStatus($orderStatus);

            if($onHoldOrders) {
                return $onHoldOrders;
            }else{
                return false;
            };

        }

                
    }
 
    $init = new Orders;

    if($_SERVER['REQUEST_METHOD'] === 'GET'){

        switch($_GET['type']){
            case 'confirm':       
                $init->confirmeOrderStatus();
                break;
            case 'reject': 
                $init->rejectOrder();
                break;
            case 'ordersByParam': 
                $init->displayOrdersByParam();
            default:
                break;
        }
    
    }else if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $init->addOrder(); 
    }