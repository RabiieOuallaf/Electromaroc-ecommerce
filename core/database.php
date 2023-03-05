<?php 

    // This is a pdo db class

    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $db_name = DB_NAME;
        private $pwd = DB_PASS;
        private $port = 3307;
        private $dbh;
        private $stmt;
        private $erorr;


        public function __construct() {
            $dsn = "mysql:host=".$this->host.";port=$this->port;dbname=".$this->db_name;

            $options = array(
                PDO::ATTR_PERSISTENT => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            // Create pdo instance 

            try{

                $this->dbh = new PDO($dsn, $this->user, $this->pwd, $options);

            }catch(PDOException $e){
                $this->erorr = $e->getMessage();
                echo $this->erorr;
            }

        }

        // Prepate the statment along with query 

        public function query($sql){

            $this->stmt = $this->dbh->prepare($sql);

        }

        

        // Banding values 

        public function bind($param, $value, $type = null){

            if(is_null($type)){ // if the framework user didn't pass the type 

                switch(true){

                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value): 
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value): 
                        $type = PDO::PARAM_NULL;
                        break;
                    default: 
                        $type = PDO::PARAM_STR;
    
                    
                }

            }

            $this->stmt->bindValue($param, $value, $type);
 
        }
        // Execute the prepared statement 
        
        public function execute(){
            
            return $this->stmt->execute();
        }

        // Fetch result

        public function resultSet(){

            $this->execute();

            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }


        public function single() {

            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);

        }

        public function singleBind($query, $param, $value) { // ge a single result and allow the param binding 

            $this->stmt = $this->dbh->prepare($query);
            $this->stmt->bindValue($param,$value, PDO::PARAM_INT);

            if($this->execute()) {
                return $this->stmt->fetch(PDO::FETCH_ASSOC);
            }else {
                return "there's no item in this table with this param";
            }
        }


        public function multiple($query){

            $this->stmt = $this->dbh->prepare($query);
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

        }

        public function multipleNoStatement($query){ // the same as multiple method , but without preparing the query 

            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

        }

          
        public function multipleBind($query, $param, $value) {
            $this->stmt = $this->dbh->prepare($query);
            $this->stmt->bindValue($param, $value, PDO::PARAM_INT);

            if($this->execute()) {
                return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return "There's no products in the cart";
            };
        }

        public function multipleOrders($query, $param, $value) {
            
            $this->stmt = $this->dbh->prepare($query);
            $this->stmt->bindValue($param, $value, PDO::PARAM_INT);
            
            if($this->execute()) {
                echo json_encode($this->stmt->fetchAll(PDO::FETCH_ASSOC));
            }else {
                return "There's no products in the cart";
            }
        }

        public function rowCount(){

            return $this->stmt->rowCount();
            
        }
    }