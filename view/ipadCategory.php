<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo SITENAME ?></title>
        <link rel="stylesheet" href="<?= URLROOT; ?>/view/assets/css/styles.css"></link>
        <link rel="stylesheet" href="<?= URLROOT; ?>/view/assets/css/tailwind.css">
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
                    <select class="cursor-pointer bg-inherit hover:text-lime-700 transition duration-170 ease-in-out" >
                        <option value=""><a href="#categories">Categories</a></option>
                        <option value="">Computers</option>
                        <option value="">Phones</option>
                        <option value="">Tablets</option>
                    </select>
                    <li class="cursor-pointer hover:text-lime-700 hover:text-lime-700 transition duration-170 ease-in-out"><a href="/index.php">Deals</a></li>
                    <li class="cursor-pointer hover:text-lime-700 hover:text-lime-700 transition duration-170 ease-in-out"><a href="/index.php">Sales</a></li>
                    <li class="cursor-pointer hover:text-lime-700 hover:text-lime-700 transition duration-170 ease-in-out"><a href="/index.php">Services</a></li>
                </ul>

            </div>

            <div class="search relative ">
                <input type="text" class="search-input rounded-full w-64 h-8 text-center bg-gray-200" placeholder="Search product" id="searchInput"/>
                <i class="fa-solid fa-magnifying-glass absolute right-3 top-2"></i>
            </div> 

            <div class="features flex justify-between">

                <div class="account flex mx-4 cursor-pointer hover:text-lime-700 transition duration-170 ease-in-out">
                    <a href="/register.php"><i class="fa-solid fa-user mx-2 my-1"></i><span>Account</span></a>
                    
                </div>

                <div class="cart flex cursor-pointer hover:text-lime-700 transition duration-170 ease-in-out">
                    <i class="fa-solid fa-cart-shopping mx-2 my-1"></i>
                    <span>Cart</span>
                </div>
            </div>

        </div>

    </nav>

    <!-- The banner -->

    <div class="banner flex justify-center mb-10">
        <img src="<?= URLROOT; ?>/view/assets/images/ipadBanner.jpg" alt="computer category banner" style="width: 50%;">
    </div>

    <!-- products section -->


    <section style="height: 100vh" class="phone-category my-5 mx-5" id="deals">

        <h2 class="my-10 mx-7 font-semibold text-neutral-700 font-sans text-2xl">Best ipad deals 📱</h2>

        <div class="deals-list categories-list grid lg:grid-cols-4 gap-10 m-auto">

            <!-- First product  -->
            <div class="product" >

                <div class="deals-image relative m-auto  bg-zinc-200 w-64 h-64 rounded-xl">

                    <i class="fa-regular fa-heart mx-5 mt-5" id="heart"></i>
                    <img src="<?= URLROOT; ?>/view/assets/images/CameraNoBg.png" alt="camera" class="m-auto">
                    
                </div>
    
                <div class="deals-description flex justify-between m-auto my-5" style="width: 90%;" >
    
                    <div class="deals-descirption-content font-mono" style="width: 70%;">

                        <h3 class="">Canon 550</h3>
                        <p class="text-xs text-grey">Canon 550 is a camera</p>

                    </div>

                    <div class="deals-price" style="width: 20%;">

                        <h4 class="text-grey font-semibold">99.89$</h4>
                        
                    </div>

                </div>


                <div class="button my-6 mx-3">
                    <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800"><span class="font-mono text-sm">Add to cart</span></button>
                </div>
                
            </div>

            

            <!-- Second product -->

            <div class="product">

                <div class="product bg-zinc-200 product w-64 h-64 rounded-xl">

                    <div class="deals-image relative m-auto">
                        <i class="fa-regular fa-heart mx-5 mt-5" id="heart"></i> 
                        <img src="<?= URLROOT; ?>/view/assets/images/conNobg.png" alt="xbox control" class="m-auto"> 
                    </div>
        
                    <div class="deals-description flex justify-between m-auto my-10" style="width: 90%;" >
        
                        <div class="deals-descirption-content font-mono" style="width: 70%;">
    
                            <h3 class="">Xbox hand</h3>
                            <p class="text-xs text-grey">Xbox hand for Xbox320</p>
    
                        </div>
    
                        <div class="deals-price" style="width: 20%;">
    
                            <h4 class="text-grey font-semibold">199.89$</h4>
                            
                        </div>
    
                    </div>
    
                    <div class="button my-6 mx-3">
                        <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800"><span class="font-mono text-sm">Add to cart</span></button>
                    </div>
                    
                </div>

            </div>

            

            <!-- Third product -->

            <div class="product">

                <div class="product bg-zinc-200 product w-64 h-64 rounded-xl">

                    <div class="deals-image">
                        <i class="fa-regular fa-heart mx-5 mt-5" id="heart"></i>
                        <img src="<?= URLROOT; ?>/view/assets/images/phoneBg.png" alt="phone" class="m-auto"> 
                    </div>
        
                    <div class="deals-description flex justify-between m-auto my-10" style="width: 90%;" >
        
                        <div class="deals-descirption-content font-mono" style="width: 70%;">
    
                            <h3 class="">Iphone 11</h3>
                            <p class="text-xs text-grey">Iphone 11 black color</p>
    
                        </div>
    
                        <div class="deals-price" style="width: 20%;">
    
                            <h4 class="text-grey font-semibold">1199.89$</h4>
                            
                        </div>
    
                    </div>
    
                    <div class="button my-6 mx-3">
                        <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800"><span class="font-mono text-sm">Add to cart</span></button>
                    </div>
                    
                    
                </div>

            </div>

            

            <!-- Fourth product -->

            <div class="product">

                <div class="product bg-zinc-200 product w-64 h-64 rounded-xl">

                    <div class="deals-image">
                        <i class="fa-regular fa-heart mx-5 mt-5" id="heart"></i> 
                        <img src="<?= URLROOT; ?>/view/assets/images/tabletNoBg.png" alt="tablet" class="m-auto">
                    </div>
        
                    <div class="deals-description flex justify-between m-auto my-10" style="width: 90%;" >
        
                        <div class="deals-descirption-content font-mono" style="width: 70%;">
    
                            <h3 class="">Ipad 8</h3>
                            <p class="text-xs text-grey">Ipad 8 for desingers</p>
    
                        </div>
    
                        <div class="deals-price" style="width: 20%;">
    
                            <h4 class="text-grey font-semibold">399.89$</h4>
                            
                        </div>
    
                    </div>
    
                    <div class="button my-6 mx-3">
                        <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800"><span class="font-mono text-sm">Add to cart</span></button>
                    </div>
                    
                </div>

            </div>


            <!-- First product  -->
            <div class="product" >

                <div class="deals-image relative m-auto  bg-zinc-200 w-64 h-64 rounded-xl">

                    <i class="fa-regular fa-heart mx-5 mt-5" id="heart"></i>
                    <img src="<?= URLROOT; ?>/view/assets/images/CameraNoBg.png" alt="camera" class="m-auto">
                    
                </div>
    
                <div class="deals-description flex justify-between m-auto my-5" style="width: 90%;" >
    
                    <div class="deals-descirption-content font-mono" style="width: 70%;">

                        <h3 class="">Canon 550</h3>
                        <p class="text-xs text-grey">Canon 550 is a camera</p>

                    </div>

                    <div class="deals-price" style="width: 20%;">

                        <h4 class="text-grey font-semibold">99.89$</h4>
                        
                    </div>

                </div>


                <div class="button my-6 mx-3">
                    <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800"><span class="font-mono text-sm">Add to cart</span></button>
                </div>
                
            </div>

            

            <!-- Second product -->

            <div class="product">

                <div class="product bg-zinc-200 product w-64 h-64 rounded-xl">

                    <div class="deals-image relative m-auto">
                        <i class="fa-regular fa-heart mx-5 mt-5" id="heart"></i> 
                        <img src="<?= URLROOT; ?>/view/assets/images/conNobg.png" alt="xbox control" class="m-auto"> 
                    </div>
        
                    <div class="deals-description flex justify-between m-auto my-10" style="width: 90%;" >
        
                        <div class="deals-descirption-content font-mono" style="width: 70%;">
    
                            <h3 class="">Xbox hand</h3>
                            <p class="text-xs text-grey">Xbox hand for Xbox320</p>
    
                        </div>
    
                        <div class="deals-price" style="width: 20%;">
    
                            <h4 class="text-grey font-semibold">199.89$</h4>
                            
                        </div>
    
                    </div>
    
                    <div class="button my-6 mx-3">
                        <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800"><span class="font-mono text-sm">Add to cart</span></button>
                    </div>
                    
                </div>

            </div>

            

            <!-- Third product -->

            <div class="product">

                <div class="product bg-zinc-200 product w-64 h-64 rounded-xl">

                    <div class="deals-image">
                        <i class="fa-regular fa-heart mx-5 mt-5" id="heart"></i>
                        <img src="<?= URLROOT; ?>/view/assets/images/phoneBg.png" alt="phone" class="m-auto"> 
                    </div>
        
                    <div class="deals-description flex justify-between m-auto my-10" style="width: 90%;" >
        
                        <div class="deals-descirption-content font-mono" style="width: 70%;">
    
                            <h3 class="">Iphone 11</h3>
                            <p class="text-xs text-grey">Iphone 11 black color</p>
    
                        </div>
    
                        <div class="deals-price" style="width: 20%;">
    
                            <h4 class="text-grey font-semibold">1199.89$</h4>
                            
                        </div>
    
                    </div>
    
                    <div class="button my-6 mx-3">
                        <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800"><span class="font-mono text-sm">Add to cart</span></button>
                    </div>
                    
                    
                </div>

            </div>

            

            <!-- Fourth product -->

            <div class="product">

                <div class="product bg-zinc-200 product w-64 h-64 rounded-xl">

                    <div class="deals-image">
                        <i class="fa-regular fa-heart mx-5 mt-5" id="heart"></i> 
                        <img src="<?= URLROOT; ?>/view/assets/images/tabletNoBg.png" alt="tablet" class="m-auto">
                    </div>
        
                    <div class="deals-description flex justify-between m-auto my-10" style="width: 90%;" >
        
                        <div class="deals-descirption-content font-mono" style="width: 70%;">
    
                            <h3 class="">Ipad 8</h3>
                            <p class="text-xs text-grey">Ipad 8 for desingers</p>
    
                        </div>
    
                        <div class="deals-price" style="width: 20%;">
    
                            <h4 class="text-grey font-semibold">399.89$</h4>
                            
                        </div>
    
                    </div>
    
                    <div class="button my-6 mx-3">
                        <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800"><span class="font-mono text-sm">Add to cart</span></button>
                    </div>
                    
                </div>

            </div>

            <!-- First product  -->
            <div class="product" >

                <div class="deals-image relative m-auto  bg-zinc-200 w-64 h-64 rounded-xl">

                    <i class="fa-regular fa-heart mx-5 mt-5" id="heart"></i>
                    <img src="<?= URLROOT; ?>/view/assets/images/CameraNoBg.png" alt="camera" class="m-auto">
                    
                </div>
    
                <div class="deals-description flex justify-between m-auto my-5" style="width: 90%;" >
    
                    <div class="deals-descirption-content font-mono" style="width: 70%;">

                        <h3 class="">Canon 550</h3>
                        <p class="text-xs text-grey">Canon 550 is a camera</p>

                    </div>

                    <div class="deals-price" style="width: 20%;">

                        <h4 class="text-grey font-semibold">99.89$</h4>
                        
                    </div>

                </div>


                <div class="button my-6 mx-3">
                    <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800"><span class="font-mono text-sm">Add to cart</span></button>
                </div>
                
            </div>

            

            <!-- Second product -->

            <div class="product">

                <div class="product bg-zinc-200 product w-64 h-64 rounded-xl">

                    <div class="deals-image relative m-auto">
                        <i class="fa-regular fa-heart mx-5 mt-5" id="heart"></i> 
                        <img src="<?= URLROOT; ?>/view/assets/images/conNobg.png" alt="xbox control" class="m-auto"> 
                    </div>
        
                    <div class="deals-description flex justify-between m-auto my-10" style="width: 90%;" >
        
                        <div class="deals-descirption-content font-mono" style="width: 70%;">
    
                            <h3 class="">Xbox hand</h3>
                            <p class="text-xs text-grey">Xbox hand for Xbox320</p>
    
                        </div>
    
                        <div class="deals-price" style="width: 20%;">
    
                            <h4 class="text-grey font-semibold">199.89$</h4>
                            
                        </div>
    
                    </div>
    
                    <div class="button my-6 mx-3">
                        <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800"><span class="font-mono text-sm">Add to cart</span></button>
                    </div>
                    
                </div>

            </div>

            

            <!-- Third product -->

            <div class="product">

                <div class="product bg-zinc-200 product w-64 h-64 rounded-xl">

                    <div class="deals-image">
                        <i class="fa-regular fa-heart mx-5 mt-5" id="heart"></i>
                        <img src="<?= URLROOT; ?>/view/assets/images/phoneBg.png" alt="phone" class="m-auto"> 
                    </div>
        
                    <div class="deals-description flex justify-between m-auto my-10" style="width: 90%;" >
        
                        <div class="deals-descirption-content font-mono" style="width: 70%;">
    
                            <h3 class="">Iphone 11</h3>
                            <p class="text-xs text-grey">Iphone 11 black color</p>
    
                        </div>
    
                        <div class="deals-price" style="width: 20%;">
    
                            <h4 class="text-grey font-semibold">1199.89$</h4>
                            
                        </div>
    
                    </div>
    
                    <div class="button my-6 mx-3">
                        <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800"><span class="font-mono text-sm">Add to cart</span></button>
                    </div>
                    
                    
                </div>

            </div>

            

            <!-- Fourth product -->

            <div class="product">

                <div class="product bg-zinc-200 product w-64 h-64 rounded-xl">

                    <div class="deals-image">
                        <i class="fa-regular fa-heart mx-5 mt-5" id="heart"></i> 
                        <img src="<?= URLROOT; ?>/view/assets/images/tabletNoBg.png" alt="tablet" class="m-auto">
                    </div>
        
                    <div class="deals-description flex justify-between m-auto my-10" style="width: 90%;" >
        
                        <div class="deals-descirption-content font-mono" style="width: 70%;">
    
                            <h3 class="">Ipad 8</h3>
                            <p class="text-xs text-grey">Ipad 8 for desingers</p>
    
                        </div>
    
                        <div class="deals-price" style="width: 20%;">
    
                            <h4 class="text-grey font-semibold">399.89$</h4>
                            
                        </div>
    
                    </div>
    
                    <div class="button my-6 mx-3">
                        <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800"><span class="font-mono text-sm">Add to cart</span></button>
                    </div>
                    
                </div>

            </div>

            <!-- First product  -->
            <div class="product" >

                <div class="deals-image relative m-auto  bg-zinc-200 w-64 h-64 rounded-xl">

                    <i class="fa-regular fa-heart mx-5 mt-5" id="heart"></i>
                    <img src="<?= URLROOT; ?>/view/assets/images/CameraNoBg.png" alt="camera" class="m-auto">
                    
                </div>
    
                <div class="deals-description flex justify-between m-auto my-5" style="width: 90%;" >
    
                    <div class="deals-descirption-content font-mono" style="width: 70%;">

                        <h3 class="">Canon 550</h3>
                        <p class="text-xs text-grey">Canon 550 is a camera</p>

                    </div>

                    <div class="deals-price" style="width: 20%;">

                        <h4 class="text-grey font-semibold">99.89$</h4>
                        
                    </div>

                </div>


                <div class="button my-6 mx-3">
                    <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800"><span class="font-mono text-sm">Add to cart</span></button>
                </div>
                
            </div>

            

            <!-- Second product -->

            <div class="product">

                <div class="product bg-zinc-200 product w-64 h-64 rounded-xl">

                    <div class="deals-image relative m-auto">
                        <i class="fa-regular fa-heart mx-5 mt-5" id="heart"></i> 
                        <img src="<?= URLROOT; ?>/view/assets/images/conNobg.png" alt="xbox control" class="m-auto"> 
                    </div>
        
                    <div class="deals-description flex justify-between m-auto my-10" style="width: 90%;" >
        
                        <div class="deals-descirption-content font-mono" style="width: 70%;">
    
                            <h3 class="">Xbox hand</h3>
                            <p class="text-xs text-grey">Xbox hand for Xbox320</p>
    
                        </div>
    
                        <div class="deals-price" style="width: 20%;">
    
                            <h4 class="text-grey font-semibold">199.89$</h4>
                            
                        </div>
    
                    </div>
    
                    <div class="button my-6 mx-3">
                        <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800"><span class="font-mono text-sm">Add to cart</span></button>
                    </div>
                    
                </div>

            </div>

            

            <!-- Third product -->

            <div class="product">

                <div class="product bg-zinc-200 product w-64 h-64 rounded-xl">

                    <div class="deals-image">
                        <i class="fa-regular fa-heart mx-5 mt-5" id="heart"></i>
                        <img src="<?= URLROOT; ?>/view/assets/images/phoneBg.png" alt="phone" class="m-auto"> 
                    </div>
        
                    <div class="deals-description flex justify-between m-auto my-10" style="width: 90%;" >
        
                        <div class="deals-descirption-content font-mono" style="width: 70%;">
    
                            <h3 class="">Iphone 11</h3>
                            <p class="text-xs text-grey">Iphone 11 black color</p>
    
                        </div>
    
                        <div class="deals-price" style="width: 20%;">
    
                            <h4 class="text-grey font-semibold">1199.89$</h4>
                            
                        </div>
    
                    </div>
    
                    <div class="button my-6 mx-3">
                        <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800"><span class="font-mono text-sm">Add to cart</span></button>
                    </div>
                    
                    
                </div>

            </div>

            

            <!-- Fourth product -->

            <div class="product">

                <div class="product bg-zinc-200 product w-64 h-64 rounded-xl">

                    <div class="deals-image">
                        <i class="fa-regular fa-heart mx-5 mt-5" id="heart"></i> 
                        <img src="<?= URLROOT; ?>/view/assets/images/tabletNoBg.png" alt="tablet" class="m-auto">
                    </div>
        
                    <div class="deals-description flex justify-between m-auto my-10" style="width: 90%;" >
        
                        <div class="deals-descirption-content font-mono" style="width: 70%;">
    
                            <h3 class="">Ipad 8</h3>
                            <p class="text-xs text-grey">Ipad 8 for desingers</p>
    
                        </div>
    
                        <div class="deals-price" style="width: 20%;">
    
                            <h4 class="text-grey font-semibold">399.89$</h4>
                            
                        </div>
    
                    </div>
    
                    <div class="button my-6 mx-3">
                        <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800"><span class="font-mono text-sm">Add to cart</span></button>
                    </div>
                    
                </div>

            </div>
                
        </div>


        <div class="pages-count flex justify-evenly font-semiboldbg-gray-500 my-10 w-full font-">

            <span class="transition ease-in-out hover:text-green-700"> <a href="">1</a> </span>
            <span class="transition ease-in-out hover:text-green-700"> <a href="">2</a> </span>
            <span class="transition ease-in-out hover:text-green-700"> <a href="">3</a> </span>
            <span class="transition ease-in-out hover:text-green-700"> <a href="">4</a> </span>
            <span class="transition ease-in-out hover:text-green-700"> <a href="">5</a> </span>
            <span class="transition ease-in-out hover:text-green-700"> <a href="">6</a> </span>

        </div>


        <footer class="my-20 mx-5 flex" style="height: 40vh;">

            <div class="about-us mx-10">
                
                <div class="identity">
                    <!-- A logo will go here  -->
    
                    <h4 class="my-5 font-semibold text-neutral-700 font-sans text-2xl">Electro maroc</h4>
                    <p class="font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia voluptatum eum vitae veritatis</p>
    
                    <div class="payments my-7">
    
                        <h4 class="font-semibold text-neutral-700 font-sans text-xl">Accepted payments</h4>
                        <hr width="35%">
    
                        <div class="pay-brands my-5">
                            <i class="fa-brands fa-cc-paypal"></i>
                            <i class="fa-solid fa-money-bill"></i>
                            <i class="fa-brands fa-cc-visa"></i>
                            <i class="fa-brands fa-cc-apple-pay"></i>
                        </div>
                        
    
                    </div>
    
                </div>
    
            </div>
    
            <div class="propretis flex justify-around" style="width: 100%;">
    
                <div class="proprey">
    
                    <h5 class="font-semibold  my-5 text-neutral-500">About-us</h5>
    
                    <ul>
                        <li><a class="cursor-pointer">About us</a></li>
                        <li><a class="cursor-pointer">About us</a></li>
                        <li><a class="cursor-pointer">About us</a></li>
                        <li><a class="cursor-pointer">About us</a></li>
                        <li><a class="cursor-pointer">About us</a></li>
                    </ul>
    
                </div>
    
                <div class="proprey">
    
                    <h5 class="font-semibold my-5 text-neutral-500">Our-services</h5>
    
                    <ul>
                        <li><a class="cursor-pointer">Our services</a></li>
                        <li><a class="cursor-pointer">Our services</a></li>
                        <li><a class="cursor-pointer">Our services</a></li>
                        <li><a class="cursor-pointer">Our services</a></li>
                        <li><a class="cursor-pointer">Our services</a></li>
                    </ul>
    
                </div>
    
                <div class="proprey">
    
                    <h5 class="font-semibold my-5 text-neutral-500">Our-deals</h5>
    
                    <ul>
                        <li><a class="cursor-pointer">Our services</a></li>
                        <li><a class="cursor-pointer">Our services</a></li>
                        <li><a class="cursor-pointer">Our services</a></li>
                        <li><a class="cursor-pointer">Our services</a></li>
                        <li><a class="cursor-pointer">Our services</a></li>
                    </ul>
    
                </div>
    
                <div class="proprey">
    
                    <h5 class="font-semibold my-5 text-neutral-500">Our-products</h5>
    
                    <ul>
                        <li><a class="cursor-pointer">Our Products</a></li>
                        <li><a class="cursor-pointer">Our Products</a></li>
                        <li><a class="cursor-pointer">Our Products</a></li>
                        <li><a class="cursor-pointer">Our Products</a></li>
                        <li><a class="cursor-pointer">Our Products</a></li>
                    </ul>
    
                </div>
    
                <div class="proprey">
    
                    <h5 class="font-semibold my-5 text-neutral-500">Our-clients</h5>
    
                    <ul>
                        <li><a class="cursor-pointer">Our Clients</a></li>
                        <li><a class="cursor-pointer">Our Clients</a></li>
                        <li><a class="cursor-pointer">Our Clients</a></li>
                        <li><a class="cursor-pointer">Our Clients</a></li>
                        <li><a class="cursor-pointer">Our Clients</a></li>
                    </ul>
    
                </div>
    
            </div>
        </footer>
        
        

    </section>

    <script src="<?= URLROOT; ?>/view/assets/javascript/script.js"></script>



    
</body>
</html>