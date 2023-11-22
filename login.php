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
        // Generate a unique ID for the user (you can customize this logic)
        $uniqueID = uniqid();

        // Store the unique ID in a cookie
        setcookie('userToken', $uniqueID, time() + (86400 * 30), '/'); // Set expiration time (30 days)

        // Store user details in the session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $db_username;

        // Redirect to repository.html
        header('Location: repository.html');
        exit;
    } else {
        // Login failed, redirect back to the login page with an error message
        header('Location: login.php?error=1');
        exit;
    }
}

// Close the database connection
$conn->close();


/*CREATE TABLE photos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
*/
?>

