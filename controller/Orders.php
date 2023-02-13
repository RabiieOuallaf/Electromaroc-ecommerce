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


        public function addOrder(){
            
            $count = count($_POST['productId']);


            for($i = 0; $i < $count; $i++){


                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            
        
                $OrderAdded = $this->OrderModel->addOrder($_POST["productId"][$i],$_POST["productPrice"][$i], $_POST["productPrice"][$i]);

                if($OrderAdded){
                    redirect('/cart');
                    return $OrderAdded;
                }else{
                    redirect('/shop');
                    return false;
                }

            }
                
        }
            
         
        
    }
    
    $init = new Orders;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $init->addOrder();
    }