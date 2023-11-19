<?php
session_start();

// Database connection parameters
$servername = "your_database_server";
$username = "your_database_username";
$password = "your_database_password";
$database = "your_database_name";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check for a successful connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entered_username = $_POST['username'];
    $entered_password = $_POST['password'];

    // Query to check if the user exists with the entered username
    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $entered_username);
    $stmt->execute();
    $stmt->bind_result($db_username, $db_password);
    $stmt->fetch();
    $stmt->close();

    // Verify the entered password against the hashed password in the database
    if ($db_username && password_verify($entered_password, $db_password)) {
        // Login successful, redirect to a secure page or perform other actions
        $_SESSION['username'] = $db_username;
        header('Location: dashboard.php');
        exit;
    } else {
        // Login failed, redirect back to the login page with an error message
        header('Location: login.php?error=1');
        exit;
    }
}

// Close the database connection
$conn->close();
?>
