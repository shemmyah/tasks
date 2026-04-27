<?php
session_start();
include 'functions/post-functions.php';
$post_row = getPostDetails($_GET['post_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Post Details</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="css/main-style.css"> -->
</head>

<body>
    <header class="mb-5">
        <?php
        if ($_SESSION['role'] == "U") {
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
    <main class="w-full mx-auto">
        <div class="w-2/5 mx-auto">

            <div class="mb-6">
                <a href="posts.php" class="inline-block text-gray-600 hover:text-gray-900 no-underline mb-3">
                    <i class="fa-solid fa-chevron-left mr-2"></i>Back to Posts
                </a>

                <div class="text-right">
                    <a href="update-post.php?post_id=<?= $_GET['post_id'] ?>"
                        class="inline-block text-gray-600 hover:text-gray-900 no-underline text-lg">
                        <i class="fa-solid fa-pen mr-1"></i>Edit
                    </a>
                </div>
            </div>

            <article class="bg-gray-100 p-6 rounded">

                <h1 class="text-5xl font-light mb-3 text-gray-800">
                    <?= $post_row['post_title'] ?>
                </h1>

                <p class="text-sm text-gray-700 mb-6">
                    By:
                    <span class="text-blue-600 font-medium">
                        <?= $post_row['first_name'] . " " . $post_row['last_name'] ?>
                    </span>

                    <span class="mx-2">•</span>

                    <?= date("F d, Y", strtotime($post_row['date_posted'])) ?>

                    <span class="mx-2">•</span>

                    <?= $post_row['category_name'] ?>
                </p>

                <p class="text-lg leading-relaxed">
                    <?= nl2br($post_row['post_message']) ?>
                </p>

            </article>

        </div>
    </main>
</body>

</html>