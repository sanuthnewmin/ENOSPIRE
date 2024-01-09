<?php

require_once('config.php');

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_description = $_POST["event_description"];
    $speaker_name = $_POST["speaker_name"];
    $speaker_description = $_POST["speaker_description"];
    $zoom_link = $_POST["zoom_link"];

    // Handle image upload
    $targetDir = "uploads/"; // Change this to your desired directory
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

    // Insert data into the 'events' table
    $sql = "INSERT INTO events (event_time, event_description, speaker_name, speaker_description, zoom_link, image_url) VALUES (NOW(), ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $event_description, $speaker_name, $speaker_description, $zoom_link, $targetFile);

    if ($stmt->execute()) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
