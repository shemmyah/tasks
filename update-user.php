<?php
session_start();
include 'functions/user-functions.php';
$user_details = displayProfile($_GET['account_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Users</title>
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
        <div class="bg-yellow-500 text-white p-9 pl-10">
            <h2 class="text-7xl font-light">
                <i class="fa-solid fa-user-edit me-3"></i>Update User
            </h2>
        </div>
    </header>
    <main class="container-md mx-auto w-11/12 px-3 py-3">
        <form method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-12 gap-6">

                <div class="col-span-8 px-10">
                    <?php
                    if (isset($_POST['update'])) {
                        updateProfile($_GET['account_id']);
                    }
                    ?>

                    <div class="grid grid-cols-2 gap-4 mb-5">
                        <div>
                            <label for="first-name" class="text-sm block mb-2">First Name</label>
                            <input type="text" name="first_name" id="first-name"
                                class="w-full border border-gray-300 px-3 py-1.5 rounded-md"
                                required autofocus
                                value="<?= $user_details['first_name'] ?>">
                        </div>
                        <div>
                            <label for="last-name" class="text-sm block mb-2">Last Name</label>
                            <input type="text" name="last_name" id="last-name"
                                class="w-full border border-gray-300 px-3 py-1.5 rounded-md"
                                required
                                value="<?= $user_details['last_name'] ?>">
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-4 mb-5">
                        <div class="col-span-8">
                            <label for="address" class="text-sm block mb-2">Address</label>
                            <input type="text" name="address" id="address"
                                class="w-full border border-gray-300 px-3 py-1.5 rounded"
                                required
                                value="<?= $user_details['address'] ?>">
                        </div>
                        <div class="col-span-4">
                            <label for="contact-number" class="text-sm block mb-2">Contact Number</label>
                            <input type="text" name="contact_number" id="contact-number"
                                class="w-full border border-gray-300 px-3 py-1.5 rounded"
                                required
                                value="<?= $user_details['contact_number'] ?>">
                        </div>
                    </div>

                    <label for="username" class="text-sm block mb-2">Username</label>
                    <input type="text" name="username" id="username"
                        class="w-full border border-gray-300 px-3 py-1.5 rounded mb-5"
                        required
                        value="<?= $user_details['username'] ?>">

                    <div class="grid grid-cols-2 gap-4 mt-1">
                        <a href="users.php"
                            class="border border-yellow-500 text-yellow-600 text-center py-2 rounded-md w-full">
                            Cancel
                        </a>
                        <button type="submit"
                            class="bg-yellow-500 text-white w-full py-2 uppercase rounded-md"
                            name="update">
                            Update
                        </button>
                    </div>

                </div>

                <div class="col-span-4">
                    <img src="images/<?= $user_details['avatar'] ?>" class="w-full mb-3">
                    <input type="file" name="avatar"
                        class="w-full border rounded-md border-gray-300 file:mr-4 file:px-4 file:p-1.5 file:border-r file:border-gray-200 file:bg-gray-100 file:text-gray-700"
                        aria-label="Choose Photo" accept="image/*">
                </div>

            </div>
        </form>
    </main>
</body>

</html>