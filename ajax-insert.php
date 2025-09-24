<?php
include "./db-connection.php";

// Receive values
$user_name = $_POST["user_name"]; //same as key name
$user_email = $_POST["user_email"]; //same as key name
$submit_mode = $_POST["submit_mode"];

if ($submit_mode == 'add') {
    $user_sql = "INSERT INTO users(name, email, password, role) VALUES ('$user_name','$user_email', '123456','admin')";
    if (mysqli_query($conn, $user_sql)) {
        echo 1;
        exit;
    } else {
        echo 0;
        exit;
    }
} else {
    $user_sql = "UPDATE users SET name = '$user_name',  email = '$user_email', 
                password = '123456', role = 'admin' WHERE id = " . $_POST["user_id"] . "";
    if (mysqli_query($conn, $user_sql)) {
        echo 1;
        exit;
    } else {
        echo 0;
        exit;
    }
}
?>



