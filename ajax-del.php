<?php
include "./db-connection.php";

$user_sql = "DELETE FROM users WHERE id = " . $_POST['userID'] . "";
$res_sql = mysqli_query($conn, $user_sql) or die("Query Execution Failed.");
if ($res_sql) {
    echo 1;
} else {
    echo 0;
}
?>

