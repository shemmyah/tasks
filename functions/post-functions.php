<?php
require_once 'connection.php';

// ok
function displayUserPosts($user_id)
{
    $conn = dbConnect();

    $sql = "SELECT * 
            FROM posts 
            INNER JOIN categories 
            ON categories.category_id = posts.category_id 
            WHERE account_id = $user_id 
            ORDER BY date_posted";

    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                    <tr class='border-b border-gray-300 odd:bg-gray-100 hover:bg-gray-100'>
                        <td class='p-3'>" . $row['post_id'] . "</td>
                        <td class='p-3'>" . $row['post_title'] . "</td>
                        <td class='p-3'>" . $row['category_name'] . "</td>
                        <td class='p-3'>" . date("M d, Y", strtotime($row['date_posted'])) . "</td>
                        <td class='p-3'>
                            <a href='post-details.php?post_id=" . $row['post_id'] . "' 
                               class='inline-block text-sm border border-gray-800 text-gray-800 px-3 py-2 rounded hover:bg-gray-800 hover:text-white transition'>
                                <i class='fa-solid fa-angle-double-right'></i> Details
                            </a>
                        </td>
                    </tr>
                ";
            }
        } else {
            echo "
                <tr>
                    <td colspan='5' class='text-center text-lg italic font-bold p-4'>
                        No Records Found
                    </td>
                </tr>
            ";
        }
    } else {
        die("Error: " . $conn->error);
    }
}

// ok
function displayCategories(){
    $conn = dbConnect();

    $sql = "SELECT * FROM categories";

    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            echo "<option value='' hidden>CATEGORY</option>";
            while($row = $result->fetch_assoc()){
                echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
            }
        }else{
            echo "<option value='' hidden>No Category Found</option>";
        }
    } else {
        die("Error: " . $conn->error);
    }
}

function displayCategoriesUpdate(){
    $conn = dbConnect();

    $sql = "SELECT * FROM categories";
    $post_row = getPostDetails($_GET['post_id']);
    $category_id= $post_row['category_id'] ;

    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            echo "<option value='' hidden>CATEGORY</option>";
            while($row = $result->fetch_assoc()){
                if ($row['category_id'] == $category_id){
                    echo "<option selected value='".$row['category_id']."'>".$row['category_name']."</option>";
                    }else{
                    echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
                    } 
            }
        }else{
            echo "<option value='' hidden>No Category Found</option>";
        }
    } else {
        die("Error: " . $conn->error);
    }
}

// ok
function displayUsers(){
    $conn = dbConnect();
    $sql = "SELECT account_id, username FROM accounts";

    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<option value='".$row['account_id']."'>".$row['username']."</option>";
            }
        }else{
            echo "<option value='' hidden>No Records Found</option>";
        }
    } else{
        die("Error: " . $conn->error);
    }
}
function displayAllPosts()
{
    $conn = dbConnect();
    $sql = "SELECT post_id, post_title, username, category_name, date_posted 
            FROM posts 
            INNER JOIN categories ON posts.category_id = categories.category_id 
            INNER JOIN accounts ON posts.account_id = accounts.account_id 
            ORDER BY date_posted";

    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                    <tr class='border-b border-gray-300 odd:bg-gray-100 hover:bg-gray-100'>
                        <td class='p-3'>" . $row['post_id'] . "</td>
                        <td class='p-3 font-bold'>" . $row['post_title'] . "</td>
                        <td class='p-3'>" . $row['username'] . "</td>
                        <td class='p-3'>" . $row['category_name'] . "</td>
                        <td class='p-3'>" . date("M d, Y", strtotime($row['date_posted'])) . "</td>
                        <td class='p-3'>
                            <a href='post-details.php?post_id=" . $row['post_id'] . "' 
                               class='inline-block text-sm border border-gray-800 text-gray-800 px-3 py-2 rounded hover:bg-gray-800 hover:text-white transition'>
                                <i class='fa-solid fa-angle-double-right'></i> Details
                            </a>
                        </td>
                    </tr>
                ";
            }
        } else {
            echo "
                <tr>
                    <td colspan='6' class='text-center text-lg italic font-bold p-4'>
                        No Records Found
                    </td>
                </tr>
            ";
        }
    } else {
        die("Error: " . $conn->error);
    }
}

// ok
function addPost(){
    $conn = dbConnect();
    $title = $_POST['title'];
    $date_posted = $_POST['date_posted'];
    $category_id = $_POST['category_id'];
    $message = $_POST['message'];
    $author_id = $_POST['author_id'];

    $sql = "INSERT INTO posts (post_title, post_message, date_posted, account_id, category_id) VALUES ('$title','$message', '$date_posted', $author_id, $category_id)";
    
    if($conn->query($sql)){
        header("location: posts.php");
        exit;
    }else{
        die("Error: " . $conn->error);
    }
}

function addPostByUser($account_id){
    $conn = dbConnect();
    $title = $_POST['title'];
    $date_posted = $_POST['date_posted'];
    $category_id = $_POST['category_id'];
    $message = $_POST['message'];

    $sql = "INSERT INTO posts (post_title, post_message, date_posted, account_id, category_id) VALUES ('$title','$message', '$date_posted', $account_id, $category_id)";
    
    if($conn->query($sql)){
        header("location: posts.php");
        exit;
    }else{
        die("Error: " . $conn->error);
    }
}

// ok
function getPostDetails($post_id){
    $conn = dbConnect();
    
    $sql = "SELECT * FROM posts 
            INNER JOIN categories ON categories.category_id = posts.category_id 
            INNER JOIN users ON users.account_id = posts.account_id 
            WHERE post_id = $post_id";

    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    } else {
        die("Error: ". $conn->error);
    }        
}

// ok
function updatePost($post_id){
    $conn = dbConnect();
    $title = $_POST['title'];
    $date_posted = $_POST['date_posted'];
    $category_id = $_POST['category_id'];
    $author_id = $_POST['author_id'];
    $message = $_POST['message'];

    $sql = "UPDATE posts 
            SET post_title = '$title',
                date_posted = '$date_posted',
                category_id = $category_id,
                post_message = '$message',
                account_id = $author_id
            WHERE post_id = $post_id";

    if($conn->query($sql)){
        header("location: posts.php");
        exit;
    }else{
        die("Error: " . $conn->error);
    }
}

function updatePostByUser($post_id){
    $conn = dbConnect();
    $title = $_POST['title'];
    $date_posted = $_POST['date_posted'];
    $category_id = $_POST['category_id'];
    $message = $_POST['message'];

    $sql = "UPDATE posts 
            SET post_title = '$title',
                date_posted = '$date_posted',
                category_id = $category_id,
                post_message = '$message'
            WHERE post_id = $post_id";

    if($conn->query($sql)){
        header("location: posts.php");
        exit;
    }else{
        die("Error: " . $conn->error);
    }
}

// function getPost($post_id){
//     $conn = dbConnect();

//     $sql = "SELECT * FROM posts INNER JOIN categories ON categories.category_id = posts.category_id WHERE posts.post_id = $post_id";

//     if($result = $conn->query($sql)){
//         return $result->fetch_assoc();
//     } else {
//         die("Error: " . $conn->error);
//     }
// }