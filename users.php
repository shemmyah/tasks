<?php
session_start();
include 'functions/user-functions.php';
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
                <i class="fa-solid fa-user mr-3"></i> User
            </h2>
        </div>
    </header>
    <main class="">
        <div class="w-1/2 mx-auto my-10">
            <form action="" method="post" class="">
                <h3 class="text-6xl font-light mb-4">Add User</h3>
                <div class="grid grid-cols-2 gap-4 mb-2">
                    <div>
                        <input type="text" name="first_name"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 placeholder-gray-600"
                            placeholder="First Name" required autofocus>
                    </div>
                    <div>
                        <input type="text" name="last_name"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 placeholder-gray-600"
                            placeholder="Last Name" required>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-2">
                    <div>
                        <input type="text" name="contact_number"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 placeholder-gray-600"
                            placeholder="Contact Number" required>
                    </div>
                    <div>
                        <input type="text" name="address"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 placeholder-gray-600"
                            placeholder="Address" required>
                    </div>
                </div>
                <input type="text" name="username"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 mb-2 placeholder-gray-600"
                    placeholder="Username" required>
                <input type="password" name="password"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 mb-3 placeholder-gray-600"
                    placeholder="Password" minlength="8" required>

                <button type="submit" name="add"
                    class="w-full bg-yellow-400 hover:bg-yellow-300 text-white font-bold uppercase py-2 rounded">
                    ADD
                </button>

            </form>

            <?php
            if (isset($_POST['add'])) {
                addUser();
            }
            ?>
        </div>

        <div class="w-4/5 mx-auto">
            <table class="w-full my-5 border border-gray-200">

                <thead class="bg-gray-800 text-white uppercase">
                    <tr>
                        <th class="p-3 text-left">User ID</th>
                        <th class="p-3 text-left">Full Name</th>
                        <th class="p-3 text-left">Contact Number</th>
                        <th class="p-3 text-left">Address</th>
                        <th class="p-3 text-left">Username</th>
                        <th class="p-3"></th>
                        <th class="p-3"></th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    <?php displayAllUsers(); ?>
                </tbody>

            </table>
        </div>
    </main>
</body>

</html>