<nav class="bg-cyan-400 px-10 py-2 flex items-center">
    <a href="profile.php" class="text-white font-bold text-2xl mr-6">Bloggen</a>

    <ul class="flex">
        <li>
            <a href="posts.php" class="text-white px-4 py-4 block hover:bg-cyan-600">My Posts</a>
        </li>
        <li>
            <a href="add-post-by-user.php" class="text-white px-4 py-4 block hover:bg-cyan-600">Add Post</a>
        </li>
    </ul>

    <ul class="flex ml-auto">
        <li>
            <a href="profile.php" class="text-white px-4 py-4 block hover:bg-cyan-600">
                <i class="fa-solid fa-user mr-1"></i>Welcome <?= $_SESSION['full_name']; ?>
            </a>
        </li>
        <li>
            <a href="logout.php" class="text-white px-4 py-4 block hover:bg-cyan-600">
                <i class="fa-solid fa-user mr-1"></i>Logout
            </a>
        </li>
    </ul>
</nav>