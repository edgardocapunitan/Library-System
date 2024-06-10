<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('bla.png');
    background-size: 100%;
    background-repeat: no-repeat;
    background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgb(255, 192, 203, 0.5);
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }
        h1{
            text-align: center;
            margin-top: 0;
            color: white;
        }
        h2 {
            margin-top: 0;
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #AA336A;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #FFC0CB;
        }
        .btn-container {
        margin-top: 20px;
        text-align: right;
        }   
        .btn {
        padding: 10px 20px;
        font-size: 16px;
        margin: 0 10px;
        background-color: #A020F0;
        color: white;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        }
        .btn:hover {
        background-color: #7F00FF;
        }
    </style>
</head>
<body>
    <h1>Library System</h1>
    <div class="container">
        <h2>Return Books here!</h2>
        <form action="return.php" method="post">
            <label for="BookID">Book ID:</label>
            <input type="text" id="BookID" name="BookID" required><br><br>
            
            <input type="submit" value="Return">
        </form>
        <?php
        include 'connection.php'; 

     
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
        $BookID = $_POST['BookID'];

       
        $sql = "SELECT * FROM tblborrowtransact WHERE BookID = $BookID AND ReturnDate IS NULL";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            
            $return_date = date("Y-m-d");
            $sql = "UPDATE tblborrowtransact SET ReturnDate = '$return_date' WHERE BookID = $BookID AND ReturnDate IS NULL";
            $conn->query($sql);

          
            $sql = "UPDATE books SET Availability = 'Available' WHERE BookID = $BookID";
            $conn->query($sql);

            echo "<p class='success'>Book returned successfully.</p>";
        } else {
            echo "<p class='error'>No active borrowing record found for this book.</p>";
        }
    }

        $conn->close();
        ?>
        <div class="btn-container">
      <a href="read.php" class="btn">Status</a>
    </div>
    </div>
</body>
</html>
