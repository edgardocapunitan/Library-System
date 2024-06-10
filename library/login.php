<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Your database connection code
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "librarydb";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection Error: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM tblstudents WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($password === $row['password']) {
                $_SESSION['username'] = $username;
                header("Location: read.php");
                exit();
            } else {
                $_SESSION['error'] = "Incorrect password";
            }
        } elseif ($result->num_rows == 0) {
            if ($password != '') {
                $_SESSION['error'] = "Invalid account";
            } else {
                $_SESSION['error'] = "Incorrect username";
            }
        }
    } else {
        $_SESSION['error'] = "Database error";
    }
    header("Location: read.php");
    exit();
}

$conn->close();
?>
