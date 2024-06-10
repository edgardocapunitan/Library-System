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
      position: relative;
    }
    h1 {
      text-align: center;
      color: white;
    }
    h2 {
      text-align: center;
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
      max-width: 600px;
      margin: 0 auto;
      background-color: rgba(255, 0, 0, 0.4);
      background: linear-gradient(45deg, #4a148c, #ff4081, #006064, #ffd600);
      background-size: 400% 400%;
      animation: gradientAnimation 10s infinite;
      backdrop-filter: blur(10px);
      padding: 20px;
      border-radius: 10px;
    }
    form {
      border: 2px solid #A1662F;
      padding: 20px;
      border-radius: 10px;
      background-color: rgba(255, 255, 0, 0.5);
      backdrop-filter: blur(5px);
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #333;
    }
    input[type="text"] {
      width: calc(100% - 20px);
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #0056b3;
      border-radius: 5px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #3e3131;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      display: block;
      margin: 10px auto 0 auto; /* Adjusted margin to reduce space */
    }
    input[type="submit"]:hover {
      background-color: #b46a6a;
    }
    .btn-container {
      margin-top: 20px;
      text-align: center;
    }
    .btn {
      padding: 10px 20px;
      font-size: 16px;
      margin: 0 10px;
      background-color: #A1662F;
      color: white;
      border: none;
      border-radius: 5px;
      text-decoration: none;
    }
    .btn:hover {
      background-color: #633b3b;
    }
    .logout-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      text-align: right;
    }
  </style>
</head>
<body>
  <a href="index.php" class="logout-btn btn">Logout</a>
  <h1>Library System</h1>
  <h2>Add New Books here!</h2>
  <div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label for="title">Title:</label>
      <input type="text" name="title" required>
      <label for="author">Author:</label>
      <input type="text" name="author" required>
      <label for="isbn">ISBN:</label>
      <input type="text" name="isbn" required>
      <label for="publishedyear">Published Year:</label>
      <input type="text" name="publishedyear" required>
      <label for="genre">Genre:</label>
      <input type="text" name="genre" required>
      <label for="Availability">Availability:</label>
      <input type="text" name="Availability">
      <input type="submit" value="Submit">
    </form>
    <?php 
    include 'connection.php'; 
    ?>
    <?php
    include 'connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $title = $_POST['title'];
      $author = $_POST['author'];
      $isbn = $_POST['isbn'];
      $publishedyear = $_POST['publishedyear'];
      $availability = $_POST['Availability'];
      $genre = isset($_POST['genre']) ? $_POST['genre'] : '';
      $sql = "INSERT INTO books (title, author, isbn, publishedyear, Availability, genre) VALUES ('$title', '$author','$isbn', '$publishedyear', '$availability', '$genre')";
      if ($conn->query($sql) === TRUE) {
        echo "New Record Inserted Successfully"; 
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    ?>
    <div class="btn-container">
      <a href="read.php" class="btn">Status</a>
      <a href="update.php" class="btn">Update</a>
      <a href="delete.php" class="btn">Delete</a>
      <a href="borrow.php" class="btn">Borrow</a>
      <a href="return.php" class="btn">Return</a>
    </div>
  </div>
</body>
</html>
