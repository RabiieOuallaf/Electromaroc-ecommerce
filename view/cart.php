<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="./assets/css/styles.css"></link>
    <link rel="stylesheet" href="./assets/css/tailwind.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/28113ccba1.js" crossorigin="anonymous"></script>
</head>

<body class="bg-zinc-100 flex">

    

    <section class="cart-page w-full">

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
        <div class="titles w-128 flex">
            <h3 class="text-xl font-bold text-slate-600 m-5 w-[50%]">Delivery informations : </h3>
            <h3 class="text-xl font-bold text-slate-600 m-5 w-[50%]">order summary : </h3>
        </div>
        
        <div class="container flex  w-fit h-fit justify-center my-10 mx-10 rounded-lg">
            <!-- == delivery informations(name , mobile number, destination ... ) ==-->
            <div class="delivery-informations-container h-full bg-white">
                <!--== delivery informations ==-->
                <div class="delivery-informations">


                    <form action="<?= URLROOT . '/controller/Orders.php' ?>" method="POST" class="mx-5 my-3 px-5 py-7 w-[90%]" id="products_form">

                            <div class="first-section flex w-[100%]">
                                <div class="client-name flex flex-col mx-2">
                                    <label for="name" class="font-semibold text-green-800 my-2" >Name: </label>
                                    <input type="text" name="clientName" class="border border-slate-500 text-slate-700 font-semibold py-3 px-4 mb-4 rounded" placeholder="rabie ouallaf" required>
                                </div>

                                <div class="client-number flex flex-col mx-2">
                                    <label for="phoneNumber" class="font-semibold text-green-800 my-2">Phone number: </label>
                                    <input type="text" name="phoneNumber" class="border border-slate-500 text-slate-700 font-semibold py-3 px-4 mb-4 rounded" placeholder="+212 771349156" required>
                                </div>
                            </div>
                            
                            <div class="second-section flex w-[100%]">
                                <div class="client-email flex flex-col mx-2">
                                    <label for="email" class="font-semibold text-green-800 my-2">Email: </label>
                                    <input type="text" name="email" class="border border-slate-500 text-slate-700 font-semibold py-3 px-4 mb-4 rounded" placeholder="rabie@gmail.com" required>
                                </div>

                                <div class="client-city flex flex-col mx-2">
                                    <label for="city" class="font-semibold text-green-800 my-2">City name: </label>
                                    <input type="text" name="city" class="border border-slate-500 text-slate-700 font-semibold py-3 px-4 mb-4 rounded" placeholder="orlando" required>
                                </div>
                            </div>
                            

                            <div class="client-adress flex flex-col mx-2">
                                <label for="adress" class="font-semibold text-green-800 my-2">House adress: </label>
                                <input type="text" name="adress" class="border border-slate-500 text-slate-700 font-semibold py-3 px-4 mb-4 rounded" placeholder="75 street 98" required>
                            </div>


                            <div class="client-adress flex flex-col mx-2">
                                <input type="submit" onclick="buyProduct()" class="border-2  p-1 border-none bg-green-800 text-white rounded-xl my-5 hover:bg-white hover:text-black hover:border transition duration-200 ease-in-out" value="valider the order">
                            </div>

                            
                            <div class="order-summary bg-white mx-10 py-8 px-10" id="product-summary-info" style="display:none;">
                    
                    
                        
                            </div>
                        
                    </form>

                </div>

                

            

            </div>

            <div class="order-summary bg-white mx-10 py-8 px-10" id="product-summary">
                
                
                    
            </div>


        </div>

        <h3 class="text-xl font-bold text-slate-600 m-5">orders status : </h3>
        <div class="Orders-status bg-white mx-10 py-8 px-10" id="Orders-status">
            
        </div>


    </section>

    <script src="<?= URLROOT; ?>/view/assets/javascript/cart/cart_productsSummary.js"></script>
</body>
</html>