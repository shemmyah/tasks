<?php
include 'functions/user-functions.php';
if(isset($_POST['register'])){
    register();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Register</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="css/main-style.css"> -->
</head>

<body>
    <main class="container-md mt-12">
        <div class="bg-white mx-auto w-[45%]">
            <div class="bg-white">
                <h1 class="text-center uppercase mb-6 text-[2.50rem] font-semibold ">Registration</h1>
            </div>
            <div class="p-5">
                <form action="#" method="post">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="first-name" class="block mb-2 text-base">First Name <span class="text-red-500">*</span></label>
                            <input type="text" name="first_name" id="first_name" class="w-full border border-gray-300 rounded-md px-3 py-1.5 focus:outline-none" required autofocus>
                        </div>
                        <div>
                            <label for="last-name" class="block mb-2 text-base">Last Name <span class="text-red-500">*</span></label>
                            <input type="text" name="last_name" id="last-name" class="w-full border border-gray-300 rounded-md px-3 py-1.5 focus:outline-none" required>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="address" class="block mb-2 text-base">Address <span class="text-red-500">*</span></label>
                        <input type="text" name="address" id="address" class="w-full border border-gray-300 rounded-md px-3 py-1.5 focus:outline-none">
                    </div>
                    <div class="mb-6">
                        <label for="contact-number" class="block mb-2 text-base">Contact Number <span class="text-red-500">*</span></label>
                        <input type="text" name="contact_number" id="contact-number" class="w-full border border-gray-300 rounded-md px-3 py-1.5 focus:outline-none" required>
                        <!-- pattern="[0-9]+" maxlength="11" placeholder="09xxxxxxxxx" -->
                    </div>
                    <div class="mb-6">
                        <label for="username" class="block mb-2 text-base">Username <span class="text-red-500">*</span></label>
                        <input type="text" name="username" id="username" class="w-full border border-gray-300 rounded-md px-3 py-1.5 focus:outline-none"" maxlength="15" required>
                    </div>
                    <div class="mb-12">
                        <label for="password" class="block mb-2 text-base">Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded-md px-3 py-1.5 focus:outline-none" minlength="8" required>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 items-center">
                        <div>
                            <button type="submit" name="register" class="bg-green-700 text-white px-12 py-2 uppercase hover:bg-green-800 transition rounded-md">Register</button>
                        </div>
                        <div class="relative">
                            <p class="position-absolute"><span class="text-black">Have an account? </span><a href="login.php" class="text-blue-600 underline">Sign In</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>