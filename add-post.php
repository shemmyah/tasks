<?php
session_start();
include 'functions/post-functions.php';

if(isset($_POST['post'])){
    addPost();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Add Post</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="css/main-style.css"> -->
    <!-- <link rel="stylesheet" href="css/add-post.css"> -->
</head>

<body>
    <header class="mb-5">
    <?php 
        if($_SESSION['role'] == 'U')
        {
            include 'user-menu.php';
        }else{
            
        include 'admin-menu.php';
        }
        ?>
        <div class="bg-blue-500 text-white p-9 pl-10">
            <h2 class="text-7xl font-light">
                <i class="fa-solid fa-pen-nib mr-3"></i>Post
            </h2>
        </div>
    </header>
    <main class="w-full mx-auto">
        <div class="w-2/5 mx-auto">
            <a href="posts.php" class="text-gray-500 no-underline mb-3 block">
                <i class="fa-solid fa-chevron-left mr-2"></i> Back to Posts
            </a>

            <h2 class="text-6xl text-center my-8 font-light">
                <i class="far fa-edit"></i> Add Post
            </h2>

            <form action="" method="post">
                <input type="text" name="title"
                    class="w-full border-b-2 border-gray-900 px-2 py-2 mb-4 rounded-none shadow-none focus:outline-none"
                    placeholder="TITLE" required autofocus>

                <input type="date" name="date_posted"
                    class="w-full border-b-2 border-gray-900 px-2 py-2 mb-4 rounded-none shadow-none focus:outline-none"
                    required>

                <select name="category_id"
                    class="w-full border-b-2 border-gray-900 px-2 py-2 mb-4 rounded-none shadow-none focus:outline-none"
                    required>
                    <?php displayCategories(); ?>
                </select>

                <textarea name="message"
                    class="w-full border-b-2 border-gray-900 px-2 py-2 mb-4 rounded-none shadow-none focus:outline-none"
                    rows="7" placeholder="MESSAGE"></textarea>

                <div class="grid grid-cols-[auto_1fr] mb-4">
                    <span class="bg-gray-500 bg-opacity-75 text-white px-3 py-2">
                        Author
                    </span>
                    <select name="author_id"
                        class="w-full border-b-2 border-gray-900 px-2 py-2 rounded-none shadow-none focus:outline-none">
                        <?php displayUsers(); ?>
                    </select>
                </div>

                <button type="submit" name="post"
                    class="w-full bg-gray-800 text-white uppercase py-2 rounded-md mt-5">
                    Post
                </button>

            </form>
        </div>

    </main>
</body>

</html>