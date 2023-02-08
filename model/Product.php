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

    class Product{

        protected $Dbh;

        public function __construct() {
            $this->Dbh = new Database;
        }

        // === Add product === // 

        public function addProduct($Productname, $ProductRefernce, $ProductCodeBar, $ProductPrice, $ProductOffer, $ProductFinal, $ProductQuantity, $ProductDescription, $ProductImage, $ProductCategory) {
            $sql = "INSERT INTO produits(produit_name, produit_codebar,  produit_refernce ,prix_achat,prix_offer, prix_final , produit_quantite, produit_description, produit_image, produit_category) VALUES (:produit_name ,:produit_codebar, :produit_refernce, :prix_achat, :prix_offer, :prix_final,:produit_quantity, :produit_description, :produit_image , :ProductCategory)";

            $this->Dbh->query($sql);

            $this->Dbh->bind(":produit_name",$Productname);
            $this->Dbh->bind(":produit_refernce",$ProductRefernce );
            $this->Dbh->bind(":produit_codebar",$ProductCodeBar);
            $this->Dbh->bind(":prix_achat",$ProductPrice);
            $this->Dbh->bind(":prix_offer",$ProductOffer);
            $this->Dbh->bind(":prix_final",$ProductFinal);
            $this->Dbh->bind(":produit_quantity",$ProductQuantity);
            $this->Dbh->bind(":produit_description",$ProductDescription);
            $this->Dbh->bind(":produit_image", $ProductImage); 
            $this->Dbh->bind(":ProductCategory", $ProductCategory);

            $row = $this->Dbh->execute();

            if($row){
                return $row;
            }else{
                return false;
            }

        }

        // === update Product === //
        public function updateProduct($ProductID, $Productname, $ProductRefernce, $ProductCodeBar, $ProductPrice, $ProductOffer, $ProductFinal, $ProductQuantity, $ProductDescription, $ProductImage,$ProductCategory) {

            $this->Dbh->query("UPDATE produits SET produit_name = :produit_name ,prix_achat = :prix_achat , prix_offer = :prix_offer , prix_final = :prix_final ,produit_description = :produit_description, produit_image = :produit_image , produit_quantite = :produit_quantity, produit_refernce = :produit_refernce, produit_codebar = :produit_codebar, produit_category = :ProductCategory WHERE produit_id = :produit_id");

            $this->Dbh->bind(":produit_name",$Productname);
            $this->Dbh->bind(":prix_achat",$ProductPrice);
            $this->Dbh->bind(":prix_offer",$ProductOffer);
            $this->Dbh->bind(":prix_final",$ProductFinal);
            $this->Dbh->bind(":produit_description",$ProductDescription);
            $this->Dbh->bind(":produit_image", $ProductImage); 
            $this->Dbh->bind(":produit_quantity",$ProductQuantity);
            $this->Dbh->bind(":produit_refernce",$ProductRefernce );
            $this->Dbh->bind(":produit_codebar",$ProductCodeBar);
            $this->Dbh->bind(":produit_id" , $ProductID);
            $this->Dbh->bind(":ProductCategory", $ProductCategory);

            $updated = $this->Dbh->execute();

            if($updated){
                return $updated;
            }else {
                return false;
            }

            
        }

        // === display products by id === //

        public function DisplayProductById($id) {
            $sql = "SELECT * from produits WHERE produit_id = :id";
            $this->Dbh->query($sql);
            $this->Dbh->bind(":id", $id);
            $row = $this->Dbh->single();

            if($row){
                return $row;
            }else {
                return false;
            }
        }

        // === display products by category === // 

        public function displayProductsByCategory($categoryID){
            
            $sql = "SELECT * FROM produits WHERE produit_category = $categoryID";
            $row = $this->Dbh->multiple($sql);

            if(!is_null($row)){
                return $row;
            }else{
                return false;
            }

        }

        // === display products === //
        public function DisplayProducts() {

            $sql = "SELECT * FROM produits";
            return $this->Dbh->multiple($sql);

        }

         

        // === delete products === //

        public function deleteProduct($id) {

            $this->Dbh->query("DELETE FROM produits WHERE produit_id = :id");
            $this->Dbh->bind(":id", $id);
            $delete = $this->Dbh->execute();
            
            if($delete){
                return true;
            }else {
                return false;
            }
            

        }

       

    }