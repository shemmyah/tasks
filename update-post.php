<?php
session_start();
include 'functions/post-functions.php';

$post_row = getPostDetails($_GET['post_id']);

if (isset($_POST['update'])) {
    updatePost($_GET['post_id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Update Blog</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="css/main-style.css"> -->
</head>

<body>
    <header class="mb-5">
        <?php
        if ($_SESSION['role'] == 'U') {
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

            <a href="post-details.php?post_id=<?= $_GET['post_id'] ?>"
                class="text-gray-500 no-underline mb-3 block">
                <i class="fa-solid fa-chevron-left mr-2"></i> Back
            </a>

            <h2 class="text-6xl text-center my-8 font-light">
                <i class="fa-solid fa-pen"></i> Update Post
            </h2>

            <form method="post">

                <input type="text" name="title"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 mb-3 focus:outline-none focus:ring-0"
                    placeholder="TITLE"
                    value="<?= $post_row['post_title'] ?>" required autofocus>

                <input type="date" name="date_posted"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 mb-3 focus:outline-none focus:ring-0"
                    value="<?= $post_row['date_posted'] ?>" required>

                <select name="category_id"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 mb-3 focus:outline-none focus:ring-0"
                    required>
                    <?php displayCategoriesUpdate(); ?>
                </select>

                <textarea name="message"
                    class="w-full border border-gray-300 rounded px-3 py-2 mb-3 focus:outline-none focus:ring-0"
                    rows="7"
                    placeholder="MESSAGE"><?= $post_row['post_message'] ?></textarea>

                <div class="grid grid-cols-[auto_1fr] mb-4">
                    <span class="bg-gray-800 text-white px-3 py-2 flex items-center rounded-l">
                        Author
                    </span>
                    <select name="author_id"
                        class="w-full border border-gray-300 px-3 py-2 rounded-r focus:outline-none focus:ring-0">
                        <?php displayUsers(); ?>
                    </select>
                </div>

                <button type="submit" name="update"
                    class="w-full bg-gray-800 text-white uppercase py-2 rounded-md mt-5">
                    Update
                </button>

            </form>
        </div>
    </main>
</body>

</html>