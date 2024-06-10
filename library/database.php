<?php

$servername = "localhost";
$Username = "root";
$password = "";
$dbname = "librarydb";

$conn = mysqli_connect($servername, $Username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function fetchAllData()
{
    global $conn;
    $sql = "SELECT * FROM tblstudents";
    $result = $conn->query($sql);
    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

