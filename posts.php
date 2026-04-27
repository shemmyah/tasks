<?php
session_start();
include 'functions/post-functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Post</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="css/main-style.css"> -->
</head>

<body>
    <header class="mb-5">
        <?php 
        if($_SESSION['role'] == "U"){
            include 'user-menu.php';
        } else {
            include 'admin-menu.php';
        }
        ?>
        <div class="bg-blue-500 text-white p-9 pl-10">
            <h2 class="text-7xl font-light">
                <i class="fa-solid fa-pen-nib mr-3"></i>Post
            </h2>
        </div>
    </header>

    <main class="w-full mx-auto px-14">

        <div class="text-right">
            <?php
            if ($_SESSION['role'] == "U") {
            ?>
                <a href="add-post-by-user.php"
                    class="inline-block text-lg border border-gray-800 text-gray-800 px-4 py-2 rounded hover:bg-gray-800 hover:text-white transition">
                    <i class="fa-solid fa-edit"></i> Add Post
                </a>
            <?php
            } else {
            ?>
                <a href="add-post.php"
                    class="inline-block text-lg border border-gray-800 text-gray-800 px-4 py-2 rounded hover:bg-gray-800 hover:text-white transition">
                    <i class="fa-solid fa-edit"></i> Add Post
                </a>
            <?php
            }
            ?>
        </div>

        <table class="w-full mt-3 border border-gray-200">

            <?php
            if ($_SESSION['role'] == 'U') {
            ?>
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="p-3 text-left">Post ID</th>
                        <th class="p-3 text-left">Title</th>
                        <th class="p-3 text-left">Category</th>
                        <th class="p-3 text-left">Date Posted</th>
                        <th class="p-3"></th>
                    </tr>
                </thead>

            <?php
            } else {
            ?>
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="p-3 text-left">#</th>
                        <th class="p-3 text-left">Title</th>
                        <th class="p-3 text-left">Author</th>
                        <th class="p-3 text-left">Category</th>
                        <th class="p-3 text-left">Date Posted</th>
                        <th class="p-3"></th>
                    </tr>
                </thead>

            <?php
            }
            ?>

            <tbody class="divide-y">
                <?php
                if ($_SESSION['role'] == 'U') {
                    displayUserPosts($_SESSION['account_id']);
                } else {
                    displayAllPosts();
                }
                ?>
            </tbody>
        </table>

    </main>
</body>

</html>