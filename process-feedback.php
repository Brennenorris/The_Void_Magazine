<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $to = "your@email.com"; // void offical email
    $subject = "Feedback from $name";
    $headers = "From: $email";
    
    mail($to, $subject, $message, $headers);

    // add server connection to test
}
?>
