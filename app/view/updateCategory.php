<?php
    if(!$_SESSION['user_role']){
        session_start();
    }
    !$_SESSION['user_role'] && redirect('/index');

    if(file_exists("../controller/Categories.php")){
        
        require_once "../controller/Categories.php";

    }else {
        require_once "controller/Categories.php";

    }
    $Product = new Categories;


    $categoryToUpdate = $Product->displayCategoryById($_GET['categorieID']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glowguru dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <div class="min-h-screen grid grid-cols-[auto_1fr] antialiased bg-white dark:bg-gray-700 text-black dark:text-white w-[100%] overflow-hidden">

        <!-- Header -->
        <div class="fixed w-full flex items-center justify-between h-14 text-white z-20 bg-gray-800">
            <div class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-64 border-none">
                <img class="hidden sm:block w-7 h-7 md:w-2/6 md:h-full mr-2 rounded-md overflow-hidden" src="" />
                <img class="hidden max-sm:block w-7 h-7 md:w-2/6 md:h-full mr-2 rounded-md overflow-hidden" src="" />
            </div>
            <div class="flex justify-between items-center h-full header-right">
                <ul class="flex items-center">
                    
                    <li>
                        <div class="block w-px h-6 mx-3 bg-gray-400 dark:bg-gray-700"></div>
                    </li>
                    <li>
                        <div class="flex items-center mr-4 hover:text-blue-100 cursor-pointer" onclick="location.href=''" >

                            <span class="inline-flex mr-1">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </span>
                                Add Product
                        </div>

                    </li>
                    <li>
                        <div class="block w-px h-6 mx-3 bg-gray-400 dark:bg-gray-700"></div>
                    </li>
                    
                    <li>
                        <div class="flex items-center mr-4 hover:text-blue-100 cursor-pointer" onclick="location.href=''">

                            <span class="inline-flex mr-1">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </span>
                                Update Product
                            </div>
                    </li>
                    <li>
                        <div class="block w-px h-6 mx-3 bg-gray-400 dark:bg-gray-700"></div>
                    </li>
                    <li>
                        <a href="<?= URLROOT .'/controller/Users.php"';?> class="flex items-center mr-4 hover:text-blue-100">
                            <span class="inline-flex mr-1">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </span>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ./Header -->

        <!-- Sidebar -->
        <div class="mt-12 flex flex-col top-14 left-0 hover:w-64 md:w-64 bg-blue-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
            <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                <ul class="flex flex-col py-4 space-y-1 items-center">

                    <li class="rounded-full border-2 border-blue-500 w-32 h-32 overflow-hidden">
                        
                        <img src="<?= URLROOT . '/view/assets/images/admin.jpg' ?>" alt="admin picture">

                    </li>
                    <li class="px-5 hidden md:block">
                    <div class="flex flex-row items-center h-8">
                        <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
                    </div>
                    </li>
                    <li>
                    <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <i class="fa-solid fa-gauge"></i>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                    </a>
                    </li>

                    
                </ul>
                <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2023 By Rabie Ouallaf</p>
            </div>
        </div>
        <!-- ./Sidebar -->

        <!-- body -->
        <!-- component -->
            <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
            <div class="container max-w-screen-lg mx-auto">
                <div class="my-5">

                    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6 my-10 mx-10">
                        <h2 class="text-lg font-semi text-black">Add product</h2>
                        <div class="grid gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">

                            <div class="lg:col-span-2">

                                <form action="<?= URLROOT ?>/controller/Categories.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="type" value="update">
                                    <input type="hidden" name="categorieID" value=<?= $categoryToUpdate->categorie_id?>>
                                    <div class="grid gap-y-2 text-sm grid-cols-1 md:grid-cols-5 my-8">

                                        <div class="md:col-span-5">
                                            <label for="categoryName" class="text-black">Categorie name</label>
                                            <input type="text" name="categoryName" id="categoryName" class="text-black h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="<?= $categoryToUpdate->categories_name?>"/>
                                        </div>

                                        <div class="md:col-span-5">
                                            <label for="categoryDescription" class="text-black">Categorie description</label>
                                            <input type="text" name="categoryDescription" id="categoryDescription" class="text-black h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="<?= $categoryToUpdate->categories_description?>"/>
                                        </div>


                                        <div class="md:col-span-5">
                                            <label for="categoryImage" class="text-black">Categorie image</label>
                                            <input name="categoryImage" type="file" id="categoryImage" class="text-black h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="<?= $categoryToUpdate->categorie_image_name?>/>
                                        </div>

                                        <div class="md:col-span-5 text-right">
                                            <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="Add product">Submit</input>
                                        </div>
                                        
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

                </a>
            </div>
            </div>




    <!-- ./body -->
    </div>

    <script src="<?= URLROOT ?>/view/assets/scripts/dashboard.js"></script>
</body>
</html>
    