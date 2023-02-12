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

        public function addOrder($clientName) {

            $sql = 'INSERT INTO orders(order_client_name) VALUES (:clientName)';
            $this->Dbh->query($sql);
            $this->Dbh->bind(':clientName', $clientName);

            $orderAdded = $this->Dbh->execute();

            if($orderAdded){
                return true;
            }else {
                return false;
            }
        }
        

    }
