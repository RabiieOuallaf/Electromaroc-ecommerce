<?php 

    // This is a pdo db class

    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $db_name = DB_NAME;
        private $pwd = DB_PASS;

        private $dbh;
        private $stmt;
        private $erorr;


        public function __construct() {
            $dsn = "mysql:host=".$this->host.";dbname=".$this->db_name;

            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            // Create pdo instance 

            try{

                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);

            }catch(PDOException $e){
                $this->erorr = $e->getMessage();
                echo $this->erorr;
            }
        }
    }