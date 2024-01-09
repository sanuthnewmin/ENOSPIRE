<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add the Google Font link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap">
    <style>
        /* Add orange color to the most recent record */
        .recent-record {
            background-color: #ffaa42; /* Adjust the color as needed */
            color: black; /* Set text color to contrast with the background */
        }
    </style>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th>Event Time</th>
                <th>Event Description</th>
                <th>Speaker Name</th>
                <th>Speaker Description</th>
                <th>Zoom Link</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('config.php');

            // Create a database connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check if the connection is successful
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Delete Record
            if (isset($_GET['delete_id'])) {
                $delete_id = $_GET['delete_id'];

                $sql = "DELETE FROM events WHERE id = $delete_id";

                if ($conn->query($sql) === true) {
                    echo "<p class='success'>Record deleted successfully.</p>";
                } else {
                    echo "<p class='error'>Error deleting record: " . $conn->error . "</p>";
                }
            }

            // Retrieve and Display Records
            $sql = "SELECT * FROM events ORDER BY event_time DESC"; // Assuming event_time is a timestamp
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $firstRow = true; // To identify the first row

                while ($row = $result->fetch_assoc()) {
                    // Add a class for styling the most recent row
                    $rowClass = $firstRow ? 'recent-record' : '';

                    echo "<tr class='$rowClass'>";
                    echo "<td style='font-family: \"Roboto\", sans-serif; font-size: 13px;'>" . $row['event_time'] . "</td>";
                    echo "<td style='font-family: \"Roboto\", sans-serif; font-size: 13px;'>" . $row['event_description'] . "</td>";
                    echo "<td style='font-family: \"Roboto\", sans-serif; font-size: 13px;'>" . $row['speaker_name'] . "</td>";
                    echo "<td style='font-family: \"Roboto\", sans-serif; font-size: 13px;'>" . $row['speaker_description'] . "</td>";
                    echo "<td style='font-family: \"Roboto\", sans-serif; font-size: 13px;'><a href='" . $row['zoom_link'] . "' target='_blank' style='color: #001f3f; text-decoration: none;'>" . $row['zoom_link'] . "</a></td>";
                    echo "<td><img src='" . $row['image_url'] . "' alt='Event Image' style='max-width: 100px; max-height: 100px;'></td>";

                    // Add a delete link
                    echo "<td><a href='?delete_id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>";

                    echo "</tr>";

                    $firstRow = false; // Set to false after the first row is processed
                }
            } else {
                echo "<tr><td colspan='7'>No events found.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

</body>

</html>
