<?php
require_once 'connection.php';


function displayCategories(){
    $conn = dbConnect();
    $sql = "SELECT * FROM categories ORDER BY category_id DESC";
    
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo"
                    <tr class='border-b border-gray-300 odd:bg-gray-100 hover:bg-gray-100'>
                        <td class='p-3'>".$row['category_id']."</td>
                        <td class='p-3'>".$row['category_name']."</td>
                        <td class='p-3'>
                            <a href='update-category.php?cat_id=".$row['category_id']."'
                               class='bg-yellow-400 text-white text-sm px-3 py-1 rounded'>
                               Update
                            </a>
                        </td>
                        <td class='p-3'>
                            <a href='delete-category.php?cat_id=".$row['category_id']."'
                               class='bg-red-500 text-white text-sm px-3 py-1 rounded'>
                               Delete
                            </a>
                        </td>
                    </tr>
                ";
            }
        } else {
            echo "<tr>
                <td colspan='4' class='text-center p-4'>
                    <p class='text-lg font-bold italic'>No Records Found</p>
                </td>
            </tr>";
        }
    } else {
        die("Error retrieving categories: " . $conn->error);
    }
}

function addCategory(){
    $conn = dbConnect();
    $category_name = $_POST['category_name'];

    $sql = "INSERT INTO categories(category_name) VALUE ('$category_name')";

    if($conn->query($sql)){
        echo "<div class='mt-5 bg-green-100 border border-green-500 text-green-700 text-center font-bold p-3'>
                NEW CATEGORY ADDED: ".$category_name."
              </div>";
    } else {
        die("Error: " . $conn->error);
    }
}

function getCategory($cat_id){
    $conn = dbConnect();
    $sql = "SELECT * FROM categories WHERE category_id = $cat_id";
    
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    } else {
        die("Error: " . $conn->error);
    }
}

function deleteCategory($cat_id){
    $conn = dbConnect();
    $sql = "DELETE FROM categories WHERE category_id = $cat_id";

    if($conn->query($sql)){
        header("location: categories.php");
        exit;
    }else{
        die("Error: " . $conn->error);
    }
}

function updateCategory($cat_id){
    $conn = dbConnect();
    $cat_name = $_POST['cat_name'];

    $sql = "UPDATE categories SET category_name = '$cat_name' WHERE category_id = $cat_id";

    if($conn->query($sql)){
        header("location: categories.php");
        exit;
    }else{
        die("Error: ".$conn->error);
    }
}
?>