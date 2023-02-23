<?php

if (file_exists("../controller/Products.php")) {
    require_once "../controller/Products.php";
} else {
    require_once "controller/Products.php";
}


$Product = $init->DisplayProductById();


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
                    <select class="cursor-pointer bg-inherit hover:text-lime-700 transition duration-170 ease-in-out">
                        <option value=""><a href="#categories">Categories</a></option>
                        <option value="">Computers</option>
                        <option value="">Phones</option>
                        <option value="">Tablets</option>
                    </select>
                    <li class="cursor-pointer hover:text-lime-700 hover:text-lime-700 transition duration-170 ease-in-out"><a href="./index.php">Deals</a></li>
                    <li class="cursor-pointer hover:text-lime-700 hover:text-lime-700 transition duration-170 ease-in-out"><a href="./index.php">Sales</a></li>
                    <li class="cursor-pointer hover:text-lime-700 hover:text-lime-700 transition duration-170 ease-in-out"><a href="./index.php">Services</a></li>
                </ul>

            </div>

            <div class="search relative ">
                <input type="text" class="search-input rounded-full w-64 h-8 text-center bg-gray-200" placeholder="Search product" id="searchInput" />
                <i class="fa-solid fa-magnifying-glass absolute right-3 top-2"></i>
            </div>

            <div class="features flex justify-between">

                <div class="account flex mx-4 cursor-pointer hover:text-lime-700 transition duration-170 ease-in-out">
                    <a href="./register.php"><i class="fa-solid fa-user mx-2 my-1"></i><span>Account</span></a>

                </div>

                <div class="cart flex cursor-pointer hover:text-lime-700 transition duration-170 ease-in-out">
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

        <div class="product-informations w-[50%] ">
            
            
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


    </section>

    <script src="<?= URLROOT; ?>/view/assets/javascript/script.js"></script>
    <script src="<?= URLROOT; ?>/view/assets/javascript/shopAjax.js"></script>
    <script src="<?= URLROOT; ?>/view/assets/javascript/cart/cart_productsSummary.js"></script>


</body>
</html>