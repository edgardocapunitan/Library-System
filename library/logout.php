<?php
session_start();

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION['Username'])) {
    header('location: login.php');
    exit;
}

// Logout logic
if (isset($_POST['logout'])) {
    session_destroy();
    unset($_SESSION['Username']);
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard    </title>
    <style>
        body {
            background-image: url(login.jpg);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 400px;
            padding: 20px;
            border-radius: 8px;
            background-color: rgb(13, 152, 186, 0.3);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            font-family: Playfair Display, serif;
            background-color: rgb(173, 216, 230, 0.7);
            color: #fff;
            padding: 15px;
            border-radius: 10px 10px 10px 10px;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 0 10px;
            background-color: rgb(255, 83, 73);
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
        button[type="submit"]:hover {
            background-color: #ff0000;
        }
        h4 {
            font-family: Playfair Display, serif;
            color: #fff;
        }
        p {
            font-family: Playfair Display, serif;
            color: #fff;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    Thank You! <?php echo htmlspecialchars($_SESSION['Username']); ?>
                </div>
                <div class="card-body">
                    <h4 class="card-title">LibraryDB is Expecting your Feedback</h4>
                    <p class="card-text">The developer hopes that you gained something here =)</p>
                    <form method="POST" action="logout.php">
                        <button type="submit" name="logout" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
