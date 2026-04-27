<nav class="bg-gray-900 px-10 py-2 flex items-center">
    <a href="dashboard.php" class="text-white font-bold text-2xl mr-6">Bloggen</a>

    <ul class="flex">
        <li>
            <a href="dashboard.php" class="text-white px-4 py-4 block hover:bg-gray-700">Dashboard</a>
        </li>
        <li>
            <a href="users.php" class="text-white px-4 py-4 block hover:bg-gray-700">Users</a>
        </li>
        <li>
            <a href="posts.php" class="text-white px-4 py-4 block hover:bg-gray-700">Posts</a>
        </li>
        <li>
            <a href="categories.php" class="text-white px-4 py-4 block hover:bg-gray-700">Categories</a>
        </li>
    </ul>
    <ul class="flex ml-auto">
        <li>
            <a href="profile.php" class="text-white px-4 py-4 block hover:bg-gray-700">
                <i class="fa-solid fa-user mr-1"></i>Welcome <?= $_SESSION['full_name'] ?>
            </a>
        </li>
        <li>
            <a href="logout.php" class="text-white px-4 py-4 block hover:bg-gray-700">
                <i class="fa-solid fa-user mr-1"></i>Logout
            </a>
        </li>
    </ul>
</nav>