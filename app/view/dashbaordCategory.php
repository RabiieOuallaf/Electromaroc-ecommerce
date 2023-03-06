<?php 
    !$_SESSION['user_role'] && redirect('/index');
    
    if(file_exists("../controller/Categories.php")){       
        require_once "../controller/Categories.php";
    }else {
        require_once "controller/Categories.php";
    }

    $categories = $init->displayCategories();


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
                        <div class="flex items-center mr-4 hover:text-blue-100 cursor-pointer" onclick="location.href='/addCategory'" >

                            <span class="inline-flex mr-1">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </span>
                                Add category
                        </div>

                    </li>
                    <li>
                        <div class="block w-px h-6 mx-3 bg-gray-400 dark:bg-gray-700"></div>
                    </li>
                    
                    <li>
                        <div class="flex items-center mr-4 hover:text-blue-100 cursor-pointer" onclick="location.href='/updatecategory'">

                            <span class="inline-flex mr-1">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </span>
                                Update category
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
                        <a href="dashbaord" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fa-solid fa-gauge"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashbaordCategory" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fa-solid fa-gauge"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashbaordOrders" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fa-solid fa-gauge"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Orders (by each product)</span>
                        </a>
                        
                    </li>
                    <li>
                            <a href="dashbaordOrdersGroup" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <i class="fa-solid fa-gauge"></i>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Orders group</span>
                            </a>
                        </li>
                    <li>
                        <a href="dashbaordUsers" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fa-solid fa-gauge"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="index" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fa-solid fa-gauge"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">the store</span>
                        </a>
                    </li>
                    

                    
                </ul>
                <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2023 By Rabie Ouallaf</p>
            </div>
        </div>
        <!-- ./Sidebar -->

        <!-- body -->
        <div class="mt-24 h-full flex flex-wrap justify-around max-sm:flex-col max-sm:items-center col-start-2 col-span-2">

            

            <div class="max-w-2xl mx-auto">

                <div class="flex flex-col">
                <div class="overflow-x shadow-md sm:rounded-lg">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>

                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            category ID
                                        </th>
                                        
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            category Name
                                        </th>

                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            category Description
                                        </th>

                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            category Image
                                        </th>

                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Actions
                                        </th>

                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

                                <?php forEach($categories as $category ){ ?>
                        
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $category["categorie_id"]?></td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $category["categories_name"]?></td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $category["categories_description"]?></td>
                                        <td class="w-96"><img src="<?= URLROOT . '/view/assets/uploads/' . $category["categorie_image_name"]?>" alt="category image" style="width:100%;"/></td>
                                        <td class="d-flex justify-content-around">

                                            <form action="<?= URLROOT ?>/controller/UpdateDeleteHandler.php" method="GET" class="flex flex-col">

                                                <input type="submit" name="type" value="delete" class="text-red-500">
                                                <input type="submit" name="type" value="update" class="text-yellow-700">
                                                <input type="hidden" name="categorieID" value="<?php echo $category['categorie_id'] ?>">

                                            </form>
                                    
                                        </td>
                                        
                                    </tr>
                                    <?php }
                                    

                                

                                ?>
                
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>


        </div>
            
            

        </div>
            

        </div>


    <!-- ./body -->
    </div>

                            
</body>
</html>