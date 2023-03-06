<?php 
    if(file_exists('../core/database.php')){
        require_once '../core/database.php';
        require_once '../config/config.php';
        require_once '../helpers/url_helpers.php';
        require_once '../core/database.php';
    }else {
        require_once 'core/database.php';
        require_once 'config/config.php';
        require_once 'helpers/url_helpers.php';
        require_once 'core/database.php';
    } 

    class Order {

        protected $Dbh;

        public function __construct()
        {
            $this->Dbh = new Database;
        }

        // === confirme Order(add it to table with onhold status) === //

        public function addOrder($data) {
            // order data
            $sql = 'INSERT INTO orders(client_id,product_id,product_total_price,product_quantity,order_status ) VALUES (:client_id,:product_id,:product_total_price,:product_quantity,:order_status)';
            $this->Dbh->query($sql);
            
            if(empty($data['productQuantity']) ? 1 : $data['productQuantity']);

            // orders data 
            $this->Dbh->bind(':product_id', (int)$data['productId']);
            $this->Dbh->bind(':client_id', (int)$_SESSION['user_id']);
            $this->Dbh->bind(':product_total_price', (int)$data['productPrice']);
            $this->Dbh->bind(':product_quantity', (int)$data['productQuantity']);
            $this->Dbh->bind(':order_status', 'onhold');

            $orderAdded = $this->Dbh->execute();
            
            if($orderAdded){ 
                return $orderAdded;
                
            }else {
                return false;
            }
        }

        public function addClientData($data) {

            
                $sql = 'INSERT INTO client(client_id,client_nomcomplet,client_email,client_telephone,client_adresse,client_ville) VALUES (:client_id,:client_nomcomplet,:client_email,:client_telephone,:client_adresse,:client_ville)';
                $this->Dbh->query($sql);
                $this->Dbh->bind(':client_id', (int)$_SESSION['user_id']);
                $this->Dbh->bind(':client_nomcomplet', $data['clientName']);
                $this->Dbh->bind(':client_email', $data['email']);
                $this->Dbh->bind(':client_telephone', $data['phoneNumber']);
                $this->Dbh->bind(':client_adresse', $data['adress']);
                $this->Dbh->bind(':client_ville', $data['city']);
                
                $clientAdded = $this->Dbh->execute();

                if($clientAdded) {
                    return $clientAdded;
                }else {
                    return false;
                }
        }

        

        // === change the order status to confirmed === // 

        public function confirmeOrderStatus($data) {
            $sql = 'UPDATE orders SET order_status = :order_status WHERE order_id = :order_id AND product_id = :product_id AND order_status != "confirmed"';
            
            $this->Dbh->query($sql);
            $this->Dbh->bind(':order_status', 'confirmed');
            $this->Dbh->bind(':order_id', $data['orderid']);
            $this->Dbh->bind(':product_id', $data['productId']);
            $orderStatusChanged = $this->Dbh->execute();     
            
            $productQuantityChanged = $this->changeProductQuantity($data);
            if($productQuantityChanged) {
                // if there's enough items in the stock , change change the order status to confirmed
                if($orderStatusChanged){
                    return $orderStatusChanged;
                }else {
                    die('something went wrong , check confirmeOrderStatus method');
                }
            }else {
                die('something went wrong , check confirmeOrderStatus method');
            }
        }
        // === Product initial quantity === //

        public function getProductIntialQuantity($productId) {
            $sql = 'SELECT produit_quantite FROM produits WHERE produit_id = :product_id';
            $productInitialQuantity = $this->Dbh->singleBind($sql, ':product_id', $productId);
            if($productInitialQuantity) {
                return $productInitialQuantity['produit_quantite'];
            }else {
                return 0;
            }

        }
         // === Change the product quantity === // 

         public function changeProductQuantity($data) {
            $productQuantity = (int)$this->getProductIntialQuantity($data['productId']);
            if($productQuantity - $data['productQuantity'] > 0) { // if there's enough items in the stock
                $sql = 'UPDATE produits SET produit_quantite = produit_quantite - :order_quantite WHERE produit_id = :product_id';
                

                $this->Dbh->query($sql);
                $this->Dbh->bind(':order_quantite', $data['productQuantity']);
                $this->Dbh->bind(':product_id', $data['productId']);
    
                $quantityChanged = $this->Dbh->execute();
                
                if($quantityChanged){
                    return $quantityChanged;
                }else{
                    
                    return false;
                }

            }else {
                die("The product quantity isn't enough to confirme this order , This order will be automatically rejected!");
                $this->rejectOrder($data);
            }
            

        }

        
       
        // === reject Order === // 

        public function rejectOrder($data) {

            $sql = 'UPDATE orders SET order_status = :order_status WHERE order_id = :order_id AND product_id = :product_id AND order_status != "Rejected"';
            $this->Dbh->query($sql);
           
            $this->Dbh->bind(':order_id', $data['orderid']);
            $this->Dbh->bind(':product_id', $data['productId']);
            $this->Dbh->bind(':order_status', 'Rejected');

            
            $orderRejected = $this->Dbh->execute();

            if($orderRejected) {
                return $orderRejected;
            }else{
                return false;
            }
        }

        // === display orders of each client  === //

        public function displayOrdersByParam($clientId) {
            $sql = 'SELECT * FROM orders WHERE client_id = :client_id';

            $orders = $this->Dbh->multipleOrders($sql ,':client_id', $clientId);
            if($orders){
                return $orders;
            }else{
                return false;
            }
        }

        // === display orders with onhold status === // 

        public function displayOrdersByStatus($orderStatus) {
            $sql = 'SELECT * from orders WHERE order_status = :order_status';

            $orders = $this->Dbh->multipleBind($sql, ':order_status', $orderStatus);

            if($orders) {
                return $orders;
            }else{
                return false;
            }
        }
        
    }

    
