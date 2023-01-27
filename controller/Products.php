<?php 

    require_once "../core/BaseController.php";
    require_once "../helpers/url_helpers.php";

    class Porducts extends BaseController{

        protected $ProductModel;

        public function __construct()
        {
            $this->ProductModel = $this->model("Product");   
        }
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
                "Product_image" => $_POST['Product_image']

            ];

            if(isset($data['Product_name']) || isset($data['Product_description']) || isset($data['Product_price']) || isset($data['Product_offer']) || isset($data['Product_codebar'])){
                return $data;
            }else {
                die("Please fill out all inputs!");
            }

        }
        public function addProduct() {

            $Product = $this->fetchData();

            $addedProduct = $this->ProductModel->addProduct($Product['Product_name'],$Product['Product_refernce'],$Product['Product_codebar'],$Product['Product_price'],$Product['Product_offer'],$Product['Product_price_final'],$Product['Product_Quantity'],$Product['Product_description'],$Product['Product_image'] );

            if($addedProduct){
                redirect('/dashbaord');
            }else {
                redirect("/addProduct");
            }
        }

    }

    $init = new Porducts;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        switch($_POST['type']){

            case 'add':
                $init->addProduct();
                break;
            default:
                break;

        }
    }