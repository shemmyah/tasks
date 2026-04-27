<?php
session_start();
include "functions/dashboard-functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Dashboard</title>
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
        <div class="bg-red-500 text-white p-9 pl-10">
            <h2 class="text-7xl font-light">
                <i class="fa-solid fa-user-cog mr-3"></i>Dashboard
            </h2>
        </div>
    </header>

    <div class="bg-gray-100 py-12">
        <div class="w-5/6 mx-auto">
            <div class="grid grid-cols-3 gap-7">
                <a href="add-post.php" class="bg-blue-600 text-white text-center font-normal px-4 py-2 rounded">
                    <i class="fa-solid fa-plus-circle mr-2"></i>Add Post
                </a>
                <a href="categories.php" class="bg-green-700 text-white text-center font-normal px-4 py-2 rounded">
                    <i class="fa-solid fa-folder-plus mr-2"></i>Add Category
                </a>
                <a href="users.php" class="bg-yellow-400 text-white text-center font-normal px-4 py-2 rounded">
                    <i class="fa-solid fa-user-plus mr-2"></i>Add User
                </a>
            </div>
        </div>
    </div>

    <main class="w-5/6 mx-auto">
        <h3 class="text-gray-600 font-bold uppercase text-2xl mb-3">All Posts</h3>

        <div class="grid grid-cols-4 gap-6">
            <div class="col-span-3">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="p-3">#</th>
                            <th class="p-3">Title</th>
                            <th class="p-3">Author</th>
                            <th class="p-3">Category</th>
                            <th class="p-3">Date Posted</th>
                            <th class="p-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php displayAllPosts(); ?>
                    </tbody>
                </table>
            </div>

            <nav class="col-span-1">
                <div class="bg-blue-600 text-white text-center rounded p-6 mb-6 border-4 border-blue-800">
                    <h3 class="text-3xl font-medium">Posts</h3>
                    <p class="text-2xl my-4">
                        <i class="fa-solid fa-pencil-alt"></i> <?= countPosts(); ?>
                    </p>
                    <a href="posts.php" class="border-2 border-white text-white text-sm font-bold uppercase px-3 py-1 rounded">
                        View
                    </a>
                </div>

                <div class="bg-green-700 text-white text-center rounded p-6 mb-6 border-4 border-green-800">
                    <h3 class="text-3xl font-medium">Categories</h3>
                    <p class="text-2xl my-4">
                        <i class="far fa-folder-open"></i> <?= countCategories(); ?>
                    </p>
                    <a href="categories.php" class="border-2 border-white text-white text-sm font-bold uppercase px-3 py-1 rounded">
                        View
                    </a>
                </div>

                <div class="bg-yellow-400 text-white text-center rounded p-6 border-4 border-yellow-500">
                    <h3 class="text-3xl font-medium">Users</h3>
                    <p class="text-2xl my-4">
                        <i class="fa-solid fa-users"></i> <?= countUsers(); ?>
                    </p>
                    <a href="users.php" class="border-2 border-white text-white text-sm font-bold uppercase px-3 py-1 rounded">
                        View
                    </a>
                </div>
            </nav>
        </div>
    </main>
</body>

</html>