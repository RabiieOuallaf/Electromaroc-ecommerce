<?php 

    require_once "../core/Database.php";
    require_once "../config/config.php";
    require_once "../helpers/url_helpers.php";

    class Product{

        protected $Dbh;

        public function __construct()
        {
            $this->Dbh = new Database;
        }

        public function addProduct($Productname, $ProductRefernce, $ProductCodeBar, $ProductPrice, $ProductOffer, $ProductFinal, $ProductQuantity, $ProductDescription, $ProductImage)
        {
            $sql = "INSERT INTO produits(produit_name, produit_codebar,  produit_refernce ,prix_achat, prix_final ,prix_offer, produit_quantite, produit_description, produit_image) VALUES (:produit_name ,:produit_codebar, :produit_refernce, :prix_achat, :prix_offer, :prix_fianl,:produit_quantity, :produit_description, :produit_image)";

            $this->Dbh->query($sql);
            $this->Dbh->bind(":produit_name",$Productname);
            $this->Dbh->bind(":produit_refernce",$ProductRefernce );
            $this->Dbh->bind(":produit_codebar",$ProductCodeBar);
            $this->Dbh->bind(":prix_achat",$ProductPrice);
            $this->Dbh->bind(":prix_offer",$ProductOffer);
            $this->Dbh->bind(":prix_fianl",$ProductFinal);
            $this->Dbh->bind(":produit_quantity",$ProductQuantity);
            $this->Dbh->bind(":produit_description",$ProductDescription);
            $this->Dbh->bind(":produit_image", $ProductImage); 

            $row = $this->Dbh->execute();

            if($row){
                return $row;
            }else{
                return false;
            }

        }

        public function DisplayProducts(){

            $sql = "SELECT * FROM products";
            return $this->Dbh->multiple($sql);

        }

    }