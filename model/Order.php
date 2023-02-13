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


        

       

        // === Add products to Order === //

        public function addOrder($data) {

            $sql = 'INSERT INTO orders( product_id,product_total_price,product_quantity) VALUES (:product_id, :product_total_price, :product_quantity)';
            $this->Dbh->query($sql);
            $this->Dbh->bind(':product_id', $data['orderId']);
            $this->Dbh->bind(':product_total_price', $data['poductprice']);
            $this->Dbh->bind(':product_quantity', $data['orderQuantity']);

            $orderAdded = $this->Dbh->execute();

            if($orderAdded){
                return true;
            }else {
                return false;
            }
        }
        

    }
