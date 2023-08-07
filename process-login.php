<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform necessary validation and sanitization on input data

    // Fetch user data from the database (replace with your database connection code)
    // Example database connection is given below
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "userdb";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $row["username"];
            header("Location: index.php");
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            echo "Incorrect password.";
        }
    } else {
        echo "Username not found.";
    }

    $conn->close();
}
?>