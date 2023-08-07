<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Save data to database (replace with your database connection code)
    // Example database connection is given below
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "userdb";
    // Perform necessary validation and sanitization on input data

    // Hash the password for security
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Sign up successful!";
        // Redirect to index page with signup details
        header("Location: index.php?signup=success&username=$username&email=$email");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
