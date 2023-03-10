<?php 
    if(file_exists("../core/baseController.php")){           
        require_once "../core/baseController.php";
    }else {
        require_once "core/baseController.php";
    }

    if(file_exists("../model/Categorie.php")){      
        require_once "../model/Categorie.php";
    }else {
        require_once "model/Categorie.php";
    }


    class Categories extends BaseController{

        protected $CategoryModel;

        public function __construct()
        {
            $this->CategoryModel = $this->model("Categorie");   
        }

        // Fetch the data 

        public function fetchData(){

            $data = [
                "CategoryName" => $_POST["categoryName"],
                "CategoryDescription" => $_POST["categoryDescription"],
                "CategoryImageName" => $_FILES["categoryImage"]["name"],
                "CategoryImageTmp" => $_FILES["categoryImage"]["tmp_name"] 
            ];

            if(!empty($data["CategoryName"]) && !empty($data["CategoryDescription"]) && !empty($data["CategoryImageName"])){
                return $data;
            }else{
                return false;
            }
        }

        // === Fetch the id === // 

        public function fetchID(){
            $categoryID = $_GET["categorieID"];

            if(!empty($categoryID)){
                return $categoryID;
            }else {
                return false;
            }
        }

        // === Add category === //

        public function addCategory(){
            $category = $this->fetchData();

            $addedCategory = $this->CategoryModel->addCategory($category["CategoryName"],$category["CategoryDescription"], $category["CategoryImageName"]);

            if($addedCategory){
                redirect("/dashbaordCategory");
            }else{
                redirect("/dashbaordCategory");
            }
        }

        // === update Category === // 

        public function updateCategory(){
            $category = $this->fetchData();
            $categoryID = $_POST["categorieID"];

            $updatedCategory = $this->CategoryModel->updateCategory($categoryID,$category["CategoryName"],$category["CategoryDescription"], $category["CategoryImageName"]);

            if($updatedCategory){
                redirect("/dashbaordCategory");
            }else{
                die("Something went wrong!");
                redirect("/dashbaordCategory");
            }


        }

        // === display categories === // 

        public function displayCategories(){
            return $this->CategoryModel->displayCategories();
        }

        // === display category by ID === // 

        public function displayCategoryById(){
            $CategoryID = $this->fetchID();
            return $this->CategoryModel->displayCategoryById($CategoryID);
        }

        // === delete cetegories === // 

        public function deleteCategories(){
            $CategoryID = $this->fetchID();
            $deletedCategory =  $this->CategoryModel->deleteCategory($CategoryID);

            if($deletedCategory){
                redirect("/dashbaordCategory");
            }else{
                die("Something went wrong !");
                redirect("/dashbaordCategory");
            }
        }

        



        
    }


    $init = new Categories;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        switch($_POST['type']){

            case 'add':
                $init->addCategory();
                break;
            case 'update':
                $init->updateCategory();
                break;
            default:
                $init->deleteCategories();
                break;

        }
    }