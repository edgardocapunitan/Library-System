<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            background-image: url('bla.png');
            background-size: 100%;
            background-repeat: no-repeat;
            background-position: center;
        }
        .container {
            background-color: rgba(160, 32, 240, 0.5);
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: 20px auto;
        }
        h1 {
            text-align: center;
            color: white;
            margin-top: 0;
        }
        h2 {
            margin-top: 0;
            text-align: center;
            color: white;
        }
        label {
            font-weight: bold;
            color: white;
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
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
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
        <h2>Borrow Books here!</h2>
        <form action="borrow.php" method="post">
            <label for="BookID">Book ID:</label>
            <input type="text" id="BookID" name="BookID" required><br><br>
            
            <label for="StudentID">Student ID:</label>
            <input type="text" id="StudentID" name="StudentID" required><br><br>
            
            <input type="submit" value="Borrow">
        </form>
        <?php
        include 'connection.php'; 

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $BookID = $_POST['BookID'];
            $StudentID = $_POST['StudentID'];

            // Check if the book is available
            $sql = "SELECT Availability FROM books WHERE BookID = $BookID";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($row['Availability'] == 'Available') {
                    // Update the book's availability to 'Borrowed'
                    $sql = "UPDATE books SET Availability = 'Borrowed' WHERE BookID = $BookID";
                    if ($conn->query($sql) === TRUE) {
                        $BorrowDate = date("Y-m-d");
                        $DueDate = date("Y-m-d", strtotime("+14 days"));

                        // Insert borrow transaction
                        $sql = "INSERT INTO tblborrowtransact (BookID, StudentID, BorrowDate, DueDate) VALUES ($BookID, $StudentID, '$BorrowDate', '$DueDate')";
                        if ($conn->query($sql) === TRUE) {
                            echo "<p>Book borrowed successfully.</p>";
                        } else {
                            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
                        }
                    } else {
                        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
                    }
                } else {
                    echo "<p>Book not available now.</p>";
                }
            } else {
                echo "<p>No such book found.</p>";
            }

            $conn->close();
        } else {
            echo "<p style='display:none;'>Book borrowed successfully.</p>";
        }
        ?>
        <div class="btn-container">
            <a href="read.php" class="btn">Status</a>
        </div>
    </div>
</body>
</html>
