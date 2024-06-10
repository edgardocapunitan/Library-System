<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    require_once "database.php"; // Include the database connection

    // Delete data with the specified ID from the 'info' table
    $sql = "DELETE FROM student WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: account_management.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
