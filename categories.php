<?php
session_start();

include 'functions/category-functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Category</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="mb-10">
        <?php 
        if($_SESSION['role'] == 'U') {
            include 'user-menu.php';
        } else {
            include 'admin-menu.php';
        }
        ?>
        <div class="bg-green-700 text-white p-9 pl-10">
            <h2 class="text-7xl font-light">
                <i class="fa-solid fa-folder mr-3"></i>Category
            </h2>
        </div>
    </header>

    <main class="mx-auto px-4">

        <div class="w-2/5 mx-auto">
            <form method="post">
                <div class="grid grid-cols-3 gap-2 items-center">
                    <div class="text-right">
                        <label for="category-name">Add Category</label>
                    </div>
                    <div>
                        <input type="text" name="category_name" id="category-name" class="border border-gray-400 rounded px-3 py-2 w-full" required autofocus>
                    </div>
                    <div>
                        <button type="submit" name="add"
                            class="bg-green-700 text-white font-bold uppercase px-4 py-2 rounded">
                            Add
                        </button>
                    </div>
                </div>
            </form>

            <?php
            if(isset($_POST['add'])) {
                addCategory();
            }
            ?>
        </div>

        <table class="w-1/2 mx-auto mt-10 text-center border-collapse">
            <thead class="bg-gray-800 text-white uppercase">
                <tr>
                    <th class="p-3">Category ID</th>
                    <th class="p-3">Category Name</th>
                    <th class="p-3"></th>
                    <th class="p-3"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                displayCategories();
                ?>
            </tbody>
        </table>

    </main>
</body>

</html>