<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library Database</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      width: 100vw;
      height: 150vh;
      margin: 0;
      background-image: url('bla.png');
      background-size: 100% 100%;
      background-repeat: no-repeat;
      background-position: center;
    } 
    h1 {
      text-align: center;
      margin-bottom: 20px;
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
      padding: 20px;
      border: 3px solid #008080;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    form {
      border: 2px solid #008080;
      padding: 20px;
      border-radius: 10px;
      background-color: rgba(255, 255, 255, 0.5);
    }
    input[type="text"] {
      width: 100%;
      padding: 9px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #00FFFF;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #008080;
    }
    .btn-container {
      margin-top: 20px;
      text-align: center;
    }
    .btn {
      padding: 10px 20px;
      font-size: 16px;
      margin: 0 10px;
      background-color: #00FFFF;
      color: #fff;
      border: none;
      border-radius: 5px;
      text-decoration: none;
    }
    .btn:hover {
      background-color: #008080;
    }
  </style>
</head>
<body>
  <h1>Library System</h1>
  <div class="container">
    <h1>Update Books</h1>
<?php
include 'connection.php'; // Database connection

// Check if a specific user's update form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $BookID = $_POST['BookID']; // Fetch studentID from the form
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $availability = isset($_POST['availability']) ? $_POST['availability'] : '';
    $publishedyear = $_POST['publishedyear'];
    $genre = isset($_POST['genre']) ? $_POST['genre'] : '';

    // SQL to update user data
    $sql = "UPDATE books SET title='$title', author='$author', isbn='$isbn', publishedyear='$publishedyear', genre='$genre', Availability='$availability' WHERE BookID=$BookID";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully.<br>";
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }
}

// Fetch all users to display in the selection form
$sql = "SELECT BookID, title FROM books";
$result = $conn->query($sql);
?>

<!-- Selection form for choosing a user to update -->
<form method="get" action="">
  <label for="BookID">Select a user to update:</label>
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
  <input type="submit" value="Edit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['BookID'])) {
    $BookID = $_GET['BookID'];
    $sql = "SELECT * FROM books WHERE BookID=$BookID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>

<form method="post" action="">
  <input type="hidden" name="BookID" value="<?php echo $row['BookID']; ?>">
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?php echo $row['title']; ?>"><br><br>
  
  <label for="author">Author:</label>
  <input type="text" name="author" id="author" value="<?php echo $row['author']; ?>"><br><br>
  
  <label for="isbn">ISBN:</label>
  <input type="text" name="isbn" id="isbn" value="<?php echo $row['isbn']; ?>"><br><br>
  
  <label for="publishedyear">Published Year:</label>
  <input type="text" name="publishedyear" id="publishedyear" value="<?php echo $row['publishedyear']; ?>"><br><br>
  
  <label for="genre">Genre:</label>
  <input type="text" name="genre" id="genre" value="<?php echo $row['genre']; ?>"><br><br>
  
  <label for="availability">Availability:</label>
  <input type="text" name="availability" id="availability" value="<?php echo $row['Availability']; ?>"><br><br>
  
  <input type="submit" name="update" value="Update">
</form>

    <?php
    } else {
      echo "No user found with ID $BookID";
    }
}
?>

<div class="btn-container">
      <a href="create.php" class="btn">Create</a>
      <a href="read.php" class="btn">Status</a>
      <a href="delete.php" class="btn">Delete</a>
      <a href="borrow.php" class="btn">Borrow</a>
</div>
  </div>
</body>
</html>
