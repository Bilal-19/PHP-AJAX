<?php
include "./db-connection.php";

$user_sql = "SELECT * FROM users WHERE id = " . $_POST["userID"] . "";
$res_sql = mysqli_query($conn, $user_sql) or die("Query Execution Failed.");
if ($row = mysqli_fetch_assoc($res_sql)) {
    echo json_encode($row);
} else {
    echo json_encode([
        "error" => "No record found"
    ]);
}
mysqli_close($conn); // Close db connection
?>

