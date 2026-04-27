<?php
session_start();
include "functions/profile-functions.php";
$user_details = getProfileDetails($_SESSION['account_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Profile</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="css/main-style.css"> -->
</head>

<body>
    <header class="mb-9">
        <?php 
        if($_SESSION['role'] == "U"){
            include 'user-menu.php';
        } else {
            include 'admin-menu.php';
        }
        ?>
        <div class="bg-gray-500 text-white p-[2.1rem] pl-12">
            <h2 class="text-7xl font-light "><i class="fa-solid fa-user"></i> Profile</h2>        
        </div>
        <div class="bg-gray-100 p-[3.1rem]">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <a class="bg-blue-600 text-white px-3 py-[0.4rem] w-1/2 block ml-auto text-center truncate rounded-md" href="change-password.php">
                        <i class="me-1 fa-solid fa-lock"></i> Change Password
                    </a>
                </div>
                <div>
                    <a class="bg-red-600 text-white px-3 py-[0.4rem] w-1/2 block mr-auto text-center truncate rounded-md" href="delete-account.php">
                        <i class="me-1 fa-solid fa-trash-alt"></i> Delete Account
                    </a>
                </div>
            </div>
        </div>
    </header>
    <main class="container-md mx-auto w-11/12 px-3 py-3">
        <form method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-8 px-10">
                <?php
                if (isset($_POST['update'])) {
                    updateProfile($_SESSION['account_id']);
                }
                ?>
                    <div class="grid grid-cols-2 gap-4 mb-5">
                        <div>
                            <label for="first-name" class="text-sm block mb-2">First Name</label>
                            <input type="text" name="first_name" id="first-name" class="w-full border border-gray-300 px-3 py-1.5 rounded-md" required autofocus value="<?= $user_details['first_name'] ?>">
                        </div>
                        <div>
                            <label for="last-name" class="text-sm block mb-2">Last Name</label>
                            <input type="text" name="last_name" id="last-name" class="w-full border border-gray-300 px-3 py-1.5 rounded-md" required value="<?= $user_details['last_name'] ?>">
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-4 mb-5">
                        <div class="col-span-8">
                            <label for="address" class="text-sm block mb-2">Address</label>
                            <input type="text" name="address" id="address" class="w-full border border-gray-300 px-3 py-1.5 rounded" required value="<?= $user_details['address'] ?>">
                        </div>
                        <div class="col-span-4">
                            <label for="contact-number" class="text-sm block mb-2">Contact Number</label>
                            <input type="text" name="contact_number" id="contact-number" class="w-full border border-gray-300 px-3 py-1.5 rounded" required value="<?= $user_details['contact_number'] ?>">
                        </div>
                    </div>

                    <label for="username" class="text-sm block mb-2">Username</label>
                    <input type="text" name="username" id="username" class="w-full border border-gray-300 px-3 py-1.5 rounded mb-5" required value="<?= $user_details['username'] ?>">

                    <label for="password" class="text-sm block mb-2">Password</label>
                    <input type="password" name="password" id="password" class="w-full border border-gray-300 px-3 py-1.5 rounded" placeholder="Enter password to confirm" required>

                    <button type="submit" class="bg-blue-600 text-white w-full mt-6 py-2 uppercase rounded-md" name="update">Update</button>
                </div>
                <div class="col-span-4">
                    <img src="images/<?= $user_details['avatar'] ?>" class='w-full mb-3'>
                    <input type="file" name="avatar" class="w-full border rounded-md border-gray-300 file:mr-4 file:px-4 file:p-1.5 file:border-r-1 file:border-gray-200 file:bg-gray-100 file:text-gray-700" aria-label="Choose Photo" accept="image/*">
                </div>
            </div>
        </form>
    </main>
</body>

</html>