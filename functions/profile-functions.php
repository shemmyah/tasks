<?php
require_once 'connection.php';

function getProfileDetails($profile_id){
    $conn = dbConnect();
    $sql = "SELECT * FROM accounts INNER JOIN users ON accounts.account_id = users.account_id WHERE accounts.account_id = $profile_id";

    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    } else {
        die("Error: " . $conn->error);
    }
}

function updateProfile($account_id){
    $conn = dbConnect();
    $password = $_POST['password'];
    $db_password = getPassword($account_id);

    if(password_verify($password, $db_password)){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $username = $_POST['username'];
        $avatar_name = $_FILES['avatar']['name'];
        $avatar_tmp = $_FILES['avatar']['tmp_name'];

        $sql = "UPDATE accounts INNER JOIN users ON users.account_id = accounts.account_id
                SET users.first_name = '$first_name',
                users.last_name = '$last_name',
                users.address = '$address',
                users.contact_number = '$contact_number',
                accounts.username = '$username'
                WHERE accounts.account_id = $account_id";

        if($conn->query($sql)){
            // Update a session variable
            $_SESSION['full_name'] = "$first_name $last_name";

            // New avatar
            if(!empty($avatar_name)){
                $sql_avatar = "UPDATE users SET avatar = '$avatar_name' WHERE account_id = $account_id";

                $conn->query($sql_avatar);

                if($conn->error){
                    die("Error: " . $conn->error);
                }

                $destination = "images/$avatar_name";
                move_uploaded_file($avatar_tmp, $destination);
            }
            header("Refresh:0");
            // echo "<div class='alert alert-success text-center fw-bold' role='alert'>Profile Updated.</div>";
        } else {
            die("Error: " . $conn->error);
        }
    } else {
        echo "<div class='alert alert-danger text-center fw-bold' role='alert'>Incorrect password.</div>";
    }    
}

function changePassword($account_id){
    $conn = dbConnect();
    $current_password = $_POST['current_password'];
    $db_passw = getPassword($account_id);
    $new_password = $_POST['new_password'];
    $conf_new = $_POST['conf_new'];

    if (password_verify($current_password, $db_passw)) {
        if ($new_password === $conf_new) {
            if($current_password != $new_password){
                $new_password = password_hash($new_password, PASSWORD_DEFAULT);
    
                $sql = "UPDATE accounts SET `password` = '$new_password' WHERE account_id = $account_id";
                
                if($conn->query($sql)){
                    header("location: profile.php");
                    exit;
                } else {
                    die("Error updating password: " . $conn->error);
                }
            } else {
                echo "<div class='mt-3 text-center fw-bold alert alert-danger' role='alert'>New Password cannot be the same as Current Password.</div>";
            }
        } else {
            echo "<div class='mt-3 text-center fw-bold alert alert-danger' role='alert'>New Password and Confirm Password do not match. </div>";
        }
    } else {
        echo "<div class='mt-3 text-center fw-bold alert alert-danger' role='alert'>Incorrect password.</div>";
    }
}

function getPassword($account_id) {
    $conn = dbConnect();

    $sql = "SELECT `password` FROM accounts WHERE account_id = $account_id";

    if($result = $conn->query($sql)) {
        $row = $result->fetch_assoc();
        return $row['password'];
    }
}

function deleteAccount($account_id){
    $conn = dbConnect();
    $password = $_POST['password'];
    $db_passw = getPassword($account_id);

    if (password_verify($password, $db_passw)) {
        $tables = ['users', 'accounts', 'posts'];
        foreach($tables as $table){
            $sql = "DELETE FROM $table WHERE account_id = $account_id";
            
            $conn->query($sql);

            if($conn->error){
                die("Error: " . $conn->error);
            }
        }
        header("location: logout.php");
        exit;
    } else {
        echo "<div class='mt-3 text-center fw-bold alert alert-danger' role='alert'>Incorrect password.</div>";
    }
}