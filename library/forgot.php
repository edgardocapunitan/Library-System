<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleforgot.css">
    <title>Forgot Password</title>
    
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2>Forgot Password</h2>
        <?php
        session_start();
        if(isset($_SESSION['error'])) {
            echo "<p class='error'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']); 
        }
        if(isset($_SESSION['success'])) {
            echo "<p class='success'>" . $_SESSION['success'] . "</p>";
            unset($_SESSION['success']); 
        }
        ?>
        <div class="form-group">
            <label for="Username"><img src="icon.png" alt="Username Icon">USERNAME:</label>
            <input type="text" name="Username" id="Username" required>
        </div>
        <div class="form-group">
            <label for="newpassword"><img src="iconp.png" alt="Password Icon">NEW PASSWORD:</label>
            <input type="password" name="newpassword" id="newpassword" required>
        </div>
        <div class="form-group">
            <label for="confirmpassword">CONFIRM PASSWORD:</label>
            <input type="password" name="confirmpassword" id="confirmpassword" required>
        </div>
        <button type="submit">Reset Password</button>
        <p>Remember Now? <a href="index.php" class="login-link"> |Login Again!| </a>

</html>

<?php
$servername = "localhost"; 
$Username = "root"; 
$password = ""; 
$dbname = "librarydb"; 

$conn = new mysqli($servername, $Username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = $conn->real_escape_string($_POST['Username']);
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];

    $check_username_query = "SELECT * FROM tblstudents WHERE Username='$Username'";
    $result = $conn->query($check_username_query);

    if ($result && $result->num_rows > 0) {
        if ($newpassword === $confirmpassword) {
            $update_password_query = "UPDATE tblstudents SET password='$newpassword' WHERE Username='$Username'";
            if ($conn->query($update_password_query) === TRUE) {
                $_SESSION['success'] = "Password reset successful. You can now login with your new password.";
            } else {
                $_SESSION['error'] = "Error updating password: " . $conn->error;
            }
        } else {
            $_SESSION['error'] = "New password and confirm password do not match.";
        }
    } else {
        $_SESSION['error'] = "Username not found.";
    }
    header("Location: forgot.php");
    exit();
}

$conn->close();
?> 
