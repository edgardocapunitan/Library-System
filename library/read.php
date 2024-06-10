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
    h1 {
      text-align: center;
      color: white;
    }
    h2 {
      text-align: center;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      border: 2px solid #000000;
      background: linear-gradient(45deg, #4a148c, #ff4081, #006064, #ffd600);
      background-size: 400% 400%;
      animation: gradientAnimation 10s infinite;
      backdrop-filter: blur(10px);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      max-height: 490px;
    }
    .table-container {
      overflow: auto;
      max-height: 330px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      opacity: 0.9;
    }
    th, td {
      padding: 10px;
      text-align: center;
      border-bottom: 2px solid #ddd;
      background-color: #B8E2F2;
    }
    th {
      background-color: #89CFF0;
    }
    th.fixed {
      position: sticky;
      top: 0;
      z-index: 1;
      background-color: #89CFF0;
    }
    .btn-container {
      margin-top: 20px;
      text-align: center;
    }
    .btn-wrapper {
      text-align: center;
    }
    .btn {
      padding: 10px 20px;
      font-size: 16px;
      margin: 0 10px;
      background-color: #A020F0;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
    }
    .btn:hover {
      background-color: #7F00FF;
    }
    .search-container {
      text-align: center;
      margin-bottom: 20px;
    }
    .search-box {
      padding: 10px;
      width: 300px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .search-button {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #A020F0;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .search-button:hover {
      background-color: #7F00FF;
    }
    .search-term {
      text-align: center;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <h1>Library System</h1>
  <div class="container">
    <h2>Search Books</h2>
    <div class="search-container">
      <form action="" method="GET">
        <input type="text" name="title" id="searchBox" class="search-box" placeholder="Search by Title">
        <button type="submit" class="search-button">Search</button>
      </form>
    </div>
    <?php
    include 'connection.php';

    // Check if the title search query exists
    if(isset($_GET['title'])) {
      $search_query = $_GET['title'];
      echo "<div class='search-term'><h3>Search results for: $search_query</h3></div>";

      // Construct the SQL query to search for books by title
      $sql = "SELECT BookID, title, author, isbn, publishedyear, genre, reg_date, Availability FROM books WHERE title LIKE '%$search_query%'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<div class='table-container'>";
        echo "<table id='booksTable'>";
        echo "<thead><tr><th class='fixed'>BookID</th><th class='fixed'>Author</th><th class='fixed'>Title</th><th class='fixed'>ISBN</th><th class='fixed'>PublishedYear</th><th class='fixed'>Genre</th><th class='fixed'>Registered</th><th class='fixed'>Availability</th></tr></thead>";
        echo "<tbody>";

        // Output the search results
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row["BookID"]."</td><td>".$row["author"]."</td><td>".$row["title"]."</td><td>".$row["isbn"]."</td><td>".$row["publishedyear"]."</td><td>".$row["genre"]."</td><td>".$row["reg_date"]."</td><td>".$row["Availability"]."</td></tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
      } else {
        // If no results found, display a message
        echo "<p>No results found.</p>";
      }
    } else {
      echo "<div class='table-container'>";
      echo "<table id='booksTable'>";
      echo "<thead><tr><th class='fixed'>BookID</th><th class='fixed'>Author</th><th class='fixed'>Title</th><th class='fixed'>ISBN</th><th class='fixed'>PublishedYear</th><th class='fixed'>Genre</th><th class='fixed'>Registered</th><th class='fixed'>Availability</th></tr></thead>";
      echo "<tbody>";

      // Fetch all books if no search query is provided
      $sql = "SELECT BookID, title, author, isbn, publishedyear, genre, reg_date, Availability FROM books";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Output all books
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row["BookID"]."</td><td>".$row["author"]."</td><td>".$row["title"]."</td><td>".$row["isbn"]."</td><td>".$row["publishedyear"]."</td><td>".$row["genre"]."</td><td>".$row["reg_date"]."</td><td>".$row["Availability"]."</td></tr>";
        }
      } else {
        // If no books found, display a message
        echo "<tr><td colspan='8'>0 results</td></tr>";
      }

      echo "</tbody>";
      echo "</table>";
      echo "</div>";
    }

    $conn->close();
    ?>
  </div>
  <div class="btn-wrapper">
    <div class="btn-container">
      <a href="create.php" class="btn">Create</a>
      <a href="update.php" class="btn">Update</a>
      <a href="delete.php" class="btn">Delete</a>
      <a href="borrow.php" class="btn">Borrow</a>
      <a href="return.php" class="btn">Return</a>
      <a href="account_management.php" class="btn">Accounts</a>
    </div>
  </div>
</body>
</html>
