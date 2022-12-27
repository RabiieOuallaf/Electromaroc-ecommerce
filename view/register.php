<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/28113ccba1.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100">
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

        <div class="S-navbar bg-white h-16 flex justify-around items-center">

            <div class="logo">ShopCart</div>

            <div class="list w-84">

                <ul class="flex justify-between gap-4" style="width: 100%;">
                    <select class="cursor-pointer bg-inherit hover:text-lime-700 transition duration-170 ease-in-out" >
                        <option value=""><a href="#categories">Categories</a></option>
                        <option value="">Computers</option>
                        <option value="">Phones</option>
                        <option value="">Tablets</option>
                    </select>
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
                    <a href="./register.php"><i class="fa-solid fa-user mx-2 my-1"></i><span>Account</span></a>
                    
                </div>

                <div class="cart flex cursor-pointer hover:text-lime-700 transition duration-170 ease-in-out">
                    <i class="fa-solid fa-cart-shopping mx-2 my-1"></i>
                    <span>Cart</span>
                </div>
            </div>

        </div>

    </nav>


    <section class="register-page flex justify-center items-center my-8 " style="height: 100vh;">

        <div class="container w-4/6 h-full bg-white flex justify-center">

            

            <div class="register flex flex-col justify-center items-center" style="width:60%;">

                <div class="register-header flex flex-col mx-10 mb-10">
                    <h3 class="font-semibold text-3xl text-gray-800">Create an account</h3>
                    <p class="font-light mt-2 text-xs" >Let's get started with creating an account</p>
                </div>

                <div class="register-form my-5">

                    <form action="../controller/Users.php" class="flex flex-col mx-10" method="POST">
                        <input type="text" placeholder="Full Name" name="FName" class="border-b-2 border-gray-300 w-64 my-4" id="inputs">
                        <input type="text" placeholder="Email" name="Email" class="border-b-2 border-gray-300 w-64 my-4" id="inputs">
                        <input type="text" placeholder="Password" name="Password" class="border-b-2 border-gray-300 w-64 my-4" id="inputs">
                        <input type="submit" value="Register" class="border-2 border-black bg-black text-white rounded-xl mt-10 hover:bg-white hover:text-black transition duration-200 ease-in-out" id="inputs">
                    </form>

                </div>
                
            </div>

            <div class="phone-banner" style="width: 40%">
                <button class="absolute z-10 mx-5 my-5 border-2 border-black bg-black text-white rounded-full mt-5 hover:bg-white hover:text-black transition duration-200 ease-in-out p-2 w-20"><a href="./login.php" class="text-center font-mono">Log in</a></button>
                <img src="./assets/images/loginBanner.jpg" alt="phone picture" class="h-full rounded-xl relative" style="width: 100%;">
            </div>

        </div>

    </section>

    <script src="./assets/javascript/register.js"></script>

</body>
</html>