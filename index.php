<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Index Page</title>
</head>
<body>
    <h1>Welcome to our website!</h1>
    <b>

    <?php
    if (isset($_GET['signup']) && $_GET['signup'] === 'success') {
        $username = $_GET['username'];
        $email = $_GET['email'];
        echo "<p>Thank you for signing up, $username!</p>";
        echo "<p>Your email: $email</p>";
    }
    ?>
    <form action="logout.php"method="post">

        <input type="submit" name="logout" value="Click me">

    </form>

    </b>
</body>
</html>
