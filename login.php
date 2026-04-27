<?php
include 'functions/user-functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-zCompatible" content="ie=edge">
    <title>Blog | Login</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="css/login.css"> -->
</head>

<body>
    <main class="container-md mt-12">
        <div class="bg-white mx-auto w-[44%]">
            <div class="bg-white">
                <h1 class="text-center uppercase mb-11 text-[2.50rem] font-semibold">Login</h1>
            </div>
            <div class="px-4 mb-6">
                <?php
                if (isset($_POST['login'])) {
                    login();
                }
                ?>
                <form action="#" method="post">
                    <input type="text" name="username" class="w-full border-b-2 border-gray-800 px-3 py-2 mb-6 focus:outline-none text-sm" placeholder="USERNAME" required autofocus>
                    <input type="password" name="password" class="w-full border-b-2 border-gray-800 px-2 py-2 mb-6 focus:outline-none text-sm" placeholder="PASSWORD" required>
                    <button type="submit" name="login" class="w-full bg-green-700 text-white py-2 uppercase rounded-md hover:bg-green-800 transition">Enter</button>
                </form>
            </div>
            <div class="bg-white">
                <div class="grid grid-cols-2 text-center text-base">
                    <div>
                        <a href="register.php" class="text-black underline">Create an Account</a>
                    </div>
                    <div>
                        <a href="recover-account.php" class="text-black underline">Recover Account</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>