<?php

    if(file_exists("../core/database.php")){
        require_once '../core/database.php';
        require_once '../config/config.php';
        require_once '../helpers/url_helpers.php';
        require_once "../core/database.php";
    }else {
        require_once 'core/database.php';
        require_once 'config/config.php';
        require_once 'helpers/url_helpers.php';
        require_once "core/database.php";
    } 


    class Categorie {
        
        protected $Dbh;

        public function __construct()
        {
            $this->Dbh = new Database;
        }

        // === add category === //

        public function addCategory($categoryName, $categoryDescription, $categoryImage)
        {
            $sql = "INSERT INTO categories(categories_name, categories_description ,categorie_image_name ) VALUES (:categoryName, :categoryDescription, :categoryImageName)";

            $this->Dbh->query($sql);

            $this->Dbh->bind(":categoryName", $categoryName);
            $this->Dbh->bind(":categoryDescription", $categoryDescription);
            $this->Dbh->bind(":categoryImageName", $categoryImage);

            $row = $this->Dbh->execute();

            if($row){
                return $row;
            }else{
                return false;
            }

            

        }

        // === update category === //


        public function updateCategory($categoryID,$categoryName, $categoryDescription, $categoryImage){
            $sql = "UPDATE categories SET categories_name = :categoryName ,  categories_description = :categoryDescription, categorie_image_name = :categoryImage WHERE  categorie_id = :categoryID";
            $this->Dbh->query($sql);

            $this->Dbh->bind(":categoryName",$categoryName);
            $this->Dbh->bind(":categoryDescription",$categoryDescription);
            $this->Dbh->bind(":categoryImage",$categoryImage);
            $this->Dbh->bind(":categoryID",$categoryID);


            $updated = $this->Dbh->execute();

            if($updated){
                
                return $updated;
            }else {
                return false;
            }
        }

      // === Delete category === //  

        public function deleteCategory($categoryID){
            $sql = "DELETE FROM categories WHERE categorie_id = :categoryID";
            $this->Dbh->query($sql);
            $this->Dbh->bind(":categoryID", $categoryID);
            $delete = $this->Dbh->execute();

            if($delete){
                return true;
            }else{
                return false;
            }
        }

        // === display category === // 

        public function displayCategories(){

            $sql = "SELECT * FROM categories";
            return $this->Dbh->multiple($sql);
            
            
        }

        // === display category by id === // 

        public function displayCategoryById($CategoryID){
            $sql = "SELECT * FROM categories WHERE categorie_id = :categoryID";
            $this->Dbh->query($sql);

            $this->Dbh->bind(":categoryID", $CategoryID);
            $display = $this->Dbh->single();

            if($display){
                return $display;
            }else{
                return false;
            }
        }

    
        
    }