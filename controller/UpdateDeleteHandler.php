<?php 

    if(file_exists("../controller/Products.php")){
            
        require_once "../controller/Products.php";

    }else {
        require_once "controller/Products.php";

    }
    $Product = new Products;
    $ProductID = $_GET['productid'];    

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        switch ($_GET['type']){

            case 'update': 
                redirect("/updateProduct/?productid=$ProductID");
                break;
            case 'delete': 
                $init->deleteProduct();
                break;

        }
    }