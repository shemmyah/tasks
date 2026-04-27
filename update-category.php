<?php
session_start();
include 'functions/category-functions.php';

$cat_details = getCategory($_GET['cat_id']);

if (isset($_POST['update'])) {
    updateCategory($_GET['cat_id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Update Category</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <main class="m-full mx-auto px-4">
        <div class="w-2/5 mx-auto">
            <h2 class="text-3xl font-medium mb-4">Update Category</h2>
            <form method="post">
                <input type="text" name="cat_name" class="border border-gray-400 rounded px-3 py-2 w-full mb-4" value="<?= $cat_details['category_name'] ?>" autofocus>

                <div class="flex gap-3">
                    <a href="categories.php" class="border border-green-700 text-green-700 text-center font-normal px-4 py-2 rounded w-full hover:bg-green-700 hover:text-white">Cancel</a>
                 
                    <button type="submit" name="update" class="bg-green-700 text-white uppercase font-normal px-4 py-2 rounded w-full">Update</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>