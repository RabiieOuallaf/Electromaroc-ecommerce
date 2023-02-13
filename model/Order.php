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

        public function addOrder($product_id, $product_total_price,$product_quantity) {

            $sql = 'INSERT INTO orders( product_id,product_total_price,product_quantity) VALUES (:product_id, :product_total_price, :product_quantity)';
            $this->Dbh->query($sql);
            $this->Dbh->bind(':product_id', $product_id);
            $this->Dbh->bind(':product_total_price', $product_total_price);
            $this->Dbh->bind(':product_quantity', $product_quantity);



            $orderAdded = $this->Dbh->execute();

            if($orderAdded){
                return true;
            }else {
                return false;
            }
        }
        

    }
