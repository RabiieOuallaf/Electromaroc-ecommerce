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
    


    <section class="register-page flex justify-center items-center my-8 " style="height: 100vh;">

        <div class="container w-4/6 h-full bg-white flex justify-center">

            

            <div class="register flex flex-col justify-center items-center" style="width:60%;">

                <div class="register-header flex flex-col mx-10 mb-10">
                    <h3 class="font-semibold text-3xl text-gray-800">Welcome back 👋</h3>
                    <p class="font-light mt-2 text-xs" >Let's get started with creating an account</p>
                </div>

                <div class="register-form my-5">

                    <form action="../controller/Users.php" class="flex flex-col mx-10" method="POST">
                        <input type="hidden" name="type" value="login">
                        <input type="text" placeholder="Email" name="Email" class="border-b-2 border-gray-300 w-64 my-4" id="inputs">
                        <input type="text" placeholder="Password" name="Password" class="border-b-2 border-gray-300 w-64 my-4" id="inputs">
                        <input type="submit" value="Login" class="border-2 border-black bg-black text-white rounded-xl mt-10 hover:bg-white hover:text-black transition duration-200 ease-in-out" id="inputs">
                    </form>

                </div>
                
            </div>

            <div class="phone-banner" style="width: 40%">
                <img src="<?= URLROOT; ?>/view/assets/images/loginPageBanner.jpg" alt="phone picture" class="h-full rounded-xl relative" style="width: 100%;">
            </div>

        </div>

    </section>

    <script src="./assets/javascript/authentification/register.js"></script>

</body>
</html>