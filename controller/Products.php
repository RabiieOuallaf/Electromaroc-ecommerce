<?php 

    if(file_exists("../core/baseController.php")){        
        require_once "../core/baseController.php";
    }else {
        require_once "core/baseController.php";
    }
    if(file_exists("../model/Product.php")){   
        require_once "../model/Product.php";
    }else {
        require_once "model/Product.php";
    }

    

    class Products extends BaseController{

        protected $ProductModel;

        public function __construct()
        {
            $this->ProductModel = $this->model("Product");   
        }

        // fetching the data 
        public function fetchData() {
            $data = [
                "Product_name" => $_POST['Product_name'],
                "Product_refernce" => $_POST['Product_refernce'],
                "Product_price_final" => (int)$_POST['Product_price_final'],
                "Product_description" => $_POST['Product_description'],
                "Product_price" => (int)$_POST['Product_price'],
                "Product_offer" => (int)$_POST['Product_offer'],
                "Product_codebar" => (int)$_POST['Product_codebar'],
                "Product_Quantity" => (int)$_POST['Product_Quantity'],
                "Product_image_name" => $_FILES['Product_image']["name"],
                "Product_image_tmp" => $_FILES['Product_image']["tmp_name"],
                "Porduct_category" => (int)$_POST['Product_category']
            ];

            if(isset($data['Product_name'])|| isset($data['Porduct_category']) || isset($data['Product_description']) || isset($data['Product_price']) || isset($data['Product_offer']) || isset($data['Product_codebar'])){
                return $data;
            }else {
                die("Please fill out all inputs!");
            }



        }
        // Get the only the product id (in case the admin wants to delete or update a specif product)

        public function fetchId() {

            $id = $_GET['productid'];
            return $id;

        }

        // Add product

        public function addProduct() {

            $Product = $this->fetchData();

            $addedProduct = $this->ProductModel->addProduct($Product['Product_name'],$Product['Product_refernce'],$Product['Product_codebar'],$Product['Product_price'],$Product['Product_offer'],$Product['Product_price_final'],$Product['Product_Quantity'],$Product['Product_description'],$Product['Product_image_name'],$Product['Porduct_category']);

           
            if($addedProduct){
                 // upload the image 
                
                $target_dir = "../view/assets/uploads/";
                $target_file = $target_dir . $Product["Product_image_name"];
                
                move_uploaded_file($Product['Product_image_tmp'] , $target_file);
                redirect('/dashbaord');
            }else {
                redirect("/addProduct");
            }
        }

        // update 
        public function updateProduct() {

            $Product = $this->fetchData();
            $id = $_POST['productid'];
            $updatedProduct = $this->ProductModel->updateProduct($id ,$Product['Product_name'],$Product['Product_refernce'],$Product['Product_codebar'],$Product['Product_price'],$Product['Product_offer'],$Product['Product_price_final'],$Product['Product_Quantity'],$Product['Product_description'],$Product['Product_image_name'] );

            if($updatedProduct){
                $target_dir = "../view/assets/uploads/";
                $target_file = $target_dir . $Product["Product_image_name"];
                move_uploaded_file($Product['Product_image_tmp'] , $target_file);
                 
                redirect('/dashbaord');
            }else {
                redirect("/updateProduct");
            }

        }

        //delete 

        public function deleteProduct() { 

            // Fetch data
            $productId = $this->fetchId();

            if($this->ProductModel->deleteProduct($productId)){
                redirect("/dashbaord");
            }else {
                die('something went wrong');
            }

        }
        // Display product(generally)

        public function displayProducts() {  
            return $this->ProductModel->DisplayProducts();
        }

        // Display products JSON format

        

        public function displayProductsByCategoryJson($categoryID){

            $data = $this->ProductModel->DisplayProductsByCategory($categoryID);

            if($data){
                echo json_encode($data);
            }else{
                die("something went wrong!, please try later");
            };
        }

        // Display product by ID 

        public function DisplayProductById() {
            $ProductID = $this->fetchId();
            return $this->ProductModel->DisplayProductById($ProductID);
        }

        // Display products by category

        public function DisplayProductsByCategory($categoryID) {

            if($this->ProductModel->DisplayProductsByCategory($categoryID)){
                return $this->ProductModel->DisplayProductsByCategory($categoryID);
            }else{
                die("something went wrong!, please try later");
            };

        }
    }

    $init = new Products;

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        
        switch($_POST["type"]){
            case "add":
                $init->addProduct();
                break;
            case "update":
                $init->updateProduct();
                break;
            default:
                break;

        }
    }
