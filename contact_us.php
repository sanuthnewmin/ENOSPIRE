<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "sanuthnewmin@gmail.com"; // replace with your email address
    $subject = $_POST["subject"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Create the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Subject: $subject\n\n";
    $email_message .= "Message:\n$message";

    // Send the email
    $headers = "From: $email";

    if (mail($to, $subject, $email_message, $headers)) {
        echo "Message sent successfully";
    } else {
        echo "Error sending message";
    }
}
?>
