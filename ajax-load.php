<?php
include "./db-connection.php";

$user_sql = "SELECT * FROM users ORDER BY id desc LIMIT 5";
$res_sql = mysqli_query($conn, $user_sql) or die("Query Execution Failed.");
$output = "";
if (mysqli_num_rows($res_sql) > 0) {
    // Loop through data
    while ($row = mysqli_fetch_assoc($res_sql)) {
        $output .= "
        <tr>
            <td>{$row["id"]}</td>
            <td>{$row["name"]}</td>
            <td>{$row["email"]}</td>
            <td>
                <button data-edit-id='{$row["id"]}' class='btn btn-primary' id='edit-rec'>Edit</button>
                <button data-id='{$row["id"]}' class='btn btn-danger' id='del-rec'>Delete</button>
            </td>
        </tr>
        ";
    }
    echo $output; //Without this data will not display
    // Close db connection
    mysqli_close($conn);
} else {
    echo "Record not found";
}
?>

