<?php
// Assuming you have a MySQL database set up with the following credentials
$servername = "your_server_name";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Insert feedback into the database
    $sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
       
        header("Location: hollow.html");
        exit();
    } 
    else {
        $error_message = "Error: " . $sql . "\n" . $conn->error;
        error_log($error_message, 3, "error_log.txt");  // 3 means append to file
        echo "An error occurred. Please try again later.";  // Display a generic message to the user.
    }
    // Close the database connection
    $conn->close();

    // Send email
    $to = "thevoidcsu@outlook.com"; // void official email
    $subject = "Feedback from $name";
    $headers = "From: $email";

    mail($to, $subject, $message, $headers);
}
?>
//feedback table; name, email, message
