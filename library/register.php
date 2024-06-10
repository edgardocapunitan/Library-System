
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('bla.png');
            background-size: 100%;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 300px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.2); 
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.9);
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: box-shadow 0.3s; 
        }

        .container:focus-within {
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.9); 
        }

        .container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .container form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container label {
            color: #fff;
            margin-bottom: 5px;
            text-align: center;
        }

        .container input[type="text"],
        .container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: box-shadow 0.3s; 
        }

        .container input[type="text"]:focus,
        .container input[type="password"]:focus {
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.7); 
        }

        .container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: black;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: box-shadow 0.3s; 
        }

        .container input[type="submit"]:hover {
            background-color: grey;
        }

        .container:focus-within input[type="submit"] {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.7); 
        }

        .container form:last-child {
            margin-top: 10px;
        }

        .container form:last-child input[type="submit"] {
            background-color: #333;
        }

        .container form:last-child input[type="submit"]:hover {
            background-color: #555;
        }

        /* Added style for success message */
        .success-message {
            color: green;
            text-align: center;
            margin-top: 10px; /* Adjust spacing */
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="register.php" method="post">
            <label for="Username">Username</label>
            <input type="text" id="username" name="Username" required>         

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="Contactinfo">Contact Information</label>
            <input type="text" id="fullname" name="Contactinfo" required>

            <label for="email">Email</label>
            <input type="text" id="gender" name="email" required>
            <br>
            <input type="submit" value="Register">
        </form>
        <br>
        <form action="index.php" method="get">
            <input type="submit" value="Login Again">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $servername = "localhost"; 
            $Username = "root"; 
            $password = ""; 
            $Contactinfo = ""; 
            $email = ""; 
            $dbname = "librarydb"; 

            $conn = new mysqli($servername, $Username, $password,$dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $Username = $_POST["Username"];
            $password = $_POST["password"];
            $Contactinfo = $_POST["Contactinfo"];
            $email = $_POST["email"];



            $check_query = "SELECT * FROM tblstudents WHERE Username = '$Username'";
            $result = $conn->query($check_query);
            if ($result->num_rows > 0) {
                
                echo "<p><b><center>If Username already exists. Please choose a different username.</center></b></p>";
            } else {
                $sql = "INSERT INTO tblstudents (Username, password, Contactinfo, email) VALUES ('$Username', '$password', '$Contactinfo', '$email')";

                if ($conn->query($sql) === TRUE) {
                    
                    echo "<p style='color: green;'>New record created successfully</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            $conn->close();
        }
        ?>
    </body>
    </html>