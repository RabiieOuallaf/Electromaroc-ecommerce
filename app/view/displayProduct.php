<?php

if (file_exists("../controller/Products.php")) {
    require_once "../controller/Products.php";
} else {
    require_once "controller/Products.php";
}
$Product = $init->DisplayProductById();

session_start();
if(empty($_SESSION) || is_null($_SESSION)){
    header('location: /login');
}    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    </link>
    <link rel="stylesheet" href="./assets/css/tailwind.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/28113ccba1.js" crossorigin="anonymous"></script>
</head>

<body>

<nav class="navbar font-mono">
        <!-- First section of navbar -->
        <div class="F-navbar bg-green-900 container mx-auto px-12 flex justify-between">
            
            <div class="phone">
                <i class="fa-sharp fa-solid fa-phone text-white"></i>
                <span class="text-white">+212 77134-9156</span>
            </div>

            <div class="announce text-white">Get 50% of your first product</div>

            <div class="options text-white"><span><a>change theme</a></span> | <span><a>languages</a></span></div>
            
        </div>

        <!-- Second section of navbar -->

        <div class="S-navbar h-16 flex justify-around items-center">

            <div class="logo">ShopCart</div>

            <div class="list w-84">

                <ul class="flex justify-between gap-4" style="width: 100%;">
                    <li class="cursor-pointer hover:text-lime-700 hover:text-lime-700 transition duration-170 ease-in-out"><a href="/shop">Shop</a></li>
                    <li class="cursor-pointer hover:text-lime-700 hover:text-lime-700 transition duration-170 ease-in-out"><a href="#deals">Deals</a></li>
                    <li class="cursor-pointer hover:text-lime-700 hover:text-lime-700 transition duration-170 ease-in-out"><a href="#sales">Sales</a></li>
                    <li class="cursor-pointer hover:text-lime-700 hover:text-lime-700 transition duration-170 ease-in-out"><a href="#services">Services</a></li>
                </ul>

            </div>

            <div class="search relative ">
                <input type="text" class="search-input rounded-full w-64 h-8 text-center bg-gray-200" placeholder="Search product" id="searchInput"/>
                <i class="fa-solid fa-magnifying-glass absolute right-3 top-2"></i>
            </div> 

            <div class="features flex justify-between">

                <div class="account flex mx-4 cursor-pointer hover:text-lime-700 transition duration-170 ease-in-out">
                   
                
                    <?php if(isset($_SESSION['user_name']) && isset($_SESSION['user_name'])){
                        ?>
                            <a href="../controller/Users.php">
                                <span class="mx-3">Welcome back</span><span class="text-lime-800 font-bold"><?= $_SESSION['user_name'] ?>👋🏻</span>
                            </a>
                        <?php
                    }else{
                        ?>
                        <a href="/register"><i class="fa-solid fa-user mx-2 my-1"></i><span>Account</span></a>
                        <?php
                    } ?>
                    
                    
                </div>

                <div class="cart flex cursor-pointer hover:text-lime-700 transition duration-170 ease-in-out" onclick="location.href='/cart'">
                    <i class="fa-solid fa-cart-shopping mx-2 my-1"></i>
                    <span>Cart</span>
                </div>
            </div>

        </div>

    </nav>

    <section class="displayProducts flex w-[90%] mx-20 my-10 ">
        <!-- Image section -->

        <div class="product-image flex my-6 w-[40%]">
            <img src="<?= URLROOT . '/view/assets/uploads/' . $Product->produit_image ?>" alt="product Image" class="w-96 h-96 rounded-md">
        </div>

        <!-- Product informations -->

        <div class="product-informations w-[50%] margin-auto ml-10">
            
            
            <div class="deals-descirption-content font-mono my-6" style="width: 70%;">

                <h2 class="my-10 font-semibold text-neutral-700 font-sans text-2xl"><?= $Product->produit_name ?></h2>
                <p class="text-md text-grey w-[80%]" ><?= $Product->produit_description ?></p>


            </div>

            <div class="deals-price my-6" style="width: 20%;">
                <h4 class="text-grey font-semibold my-4"><?= $Product->prix_achat?>$</h4>
            </div>

            <div class="button my-6 mx-3" id="cart-btn" data-id="<?= $Product->produit_id ?>" data-name="<?= $Product->produit_name ?>" data-description="<?= $Product->produit_description ?>" data-price="<?= $Product->prix_achat ?> "data-image="<?= $Product->produit_image?>" data-quantity="<?= 1 ?>">
                <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800">Add to cart</button>
            </div>

           
        </div>

        <div class="order-informations w-[35%] rounded-md bg-inherint border border-green-800" id="order-informations">
            
            
            <span class="text-xl font-bold text-slate-600 mx-10 w-[50%]">Product summary</span>
            <span class="text-lg font-bold text-slate-500 mx-10 w-[50%]">Total price : <span class="totalPrice" id="totalPrice"></span></span>

            
        </div>

        <input type="hidden" name="id" id="id" value="<?= $_GET['productid']?>">


    </section>

    <script src="<?= URLROOT; ?>/view/assets/javascript/shop/shop_productPage.js"></script>
    

</body>
</html>