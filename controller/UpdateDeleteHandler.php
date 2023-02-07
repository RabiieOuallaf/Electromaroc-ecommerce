<?php 


    if($_SERVER["REQUEST_METHOD"] === "GET" && !empty($_GET['productid'])){
        $CategoryID = $_GET['productid'];
        if(file_exists("../controller/Products.php")){
            
            require_once "../controller/Products.php";
        }else {
            require_once "controller/Products.php";
    
        }
        $Product = new Products;

        switch ($_GET['type']){

            case 'update': 
                redirect("/updateProduct/?productid=$ProductID");
                break;
            case 'delete': 
                $init->deleteProduct();
                break;

        }

    }else  if($_SERVER["REQUEST_METHOD"] === "GET" && !empty($_GET['categorieID'])){
        $CategoryID = $_GET['categorieID'];
        if(file_exists("../controller/Categories.php")){
            
            require_once "../controller/Categories.php";
        }else {
            require_once "controller/Categories.php";
    
        }
        $Category = new Categories;

        switch ($_GET['type']){

            case 'update': 
                redirect("/updateCategory/?categorieID=$CategoryID");
                break;
            case 'delete': 
                $init->deleteCategories();
                break;

        }
    }else{
        die("Sorry, the request method is not correct !");
        redirect("dashbaord");
    }


    


