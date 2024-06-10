<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "database.php"; // Include the database connection

    $id = $_POST["id"];
    $fullname = $_POST["fullname"];

    // Update data in the 'info' table
    $sql = "UPDATE student SET fullname = '$fullname' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: account_management.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
