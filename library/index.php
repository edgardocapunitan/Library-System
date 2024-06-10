<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
    <title>Login Form</title>
</head>
<body>
<div class="container" tabindex="0"> 
    <h1 class='glow'>Login Form</h1>

    <?php
 if(isset($_SESSION['error'])) {
    echo "<p style='color: red; text-align: center;'>".$_SESSION['error']."</p>";
    unset($_SESSION['error']);
} else {
    echo "<p>Please put your right Credentials</p>";
}
    ?>

    <form action="login.php" method="post">
        <label for="username"><img src="icon.png" alt="Username Icon"> USERNAME</label>
        <input type="text" name="username" id="name">
        <label for="password"><img src="iconp.png" alt="Password Icon"> PASSWORD</label>
        <input type="password" name="password" id="pass">
        <button type="submit">SUBMIT</button>
        <a href="register.php" class="register">No Account? Register!</a>
        <a href="forgot.php" class="register">Forgot Password?</a>
    </form>
</div>
</body>
</html>
