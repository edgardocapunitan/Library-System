<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library Database</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-image: url('bla.png');
    background-size: 100%;
    background-repeat: no-repeat;
    background-position: center;
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: white;
    }
    @keyframes gradientAnimation {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      background-color: rgba(255, 0, 0, 0.4);
      background: linear-gradient(45deg, #4a148c, #ff4081, #006064, #ffd600);
      background-size: 400% 400%;
      animation: gradientAnimation 10s infinite;
      backdrop-filter: blur(10px);
      border: 2px solid #000000;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    form {
      border: 1px solid #000000;
      padding: 20px;
      border-radius: 10px;
      background-color: rgba(255, 255, 255, 0.5);
    }
    select, input[type="submit"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #dc3545;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #c82333;
    }
    .btn-container {
      margin-top: 20px;
      text-align: center;
    }
    .btn {
      padding: 10px 20px;
      font-size: 16px;
      margin: 0 10px;
      background-color: #dc3545;
      color: #fff;
      border: none;
      border-radius: 5px;
      text-decoration: none;
    }
    .btn:hover {
      background-color: #c82333;
    }
  </style>
</head>
<body>
  <h1>Library System</h1>
  <div class="container">
    <h1>Delete Books</h1>
<?php
include 'connection.php'; // Database connection


// Handle deletion if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $BookID = $_POST['BookID'];


  // SQL to delete a record
  $sql = "DELETE FROM books WHERE BookID=$BookID";


  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully.<br>";
  } else {
    echo "Error deleting record: " . $conn->error . "<br>";
  }
}


// Fetch all users to display in the delete form
$sql = "SELECT BookID, title FROM books";
$result = $conn->query($sql);
?>

<!-- Form to select a user to delete -->
<form method="post" action="">
  <label for="BookID">Select a user to delete:</label>
  <select name="BookID" required>
    <option value="">Please select</option>
    <?php
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<option value='".$row["BookID"]."'>".$row["title"]."</option>";
      }
    } else {
      echo "<option value=''>No users found</option>";
    }
    ?>

</select>
      <input type="submit" value="Delete">
    </form>
    <div class="btn-container">
      <a href="create.php" class="btn">Create</a>
      <a href="read.php" class="btn">Status</a>
      <a href="update.php" class="btn">Update</a>
    </div>
  </div>
</body>
</html>


