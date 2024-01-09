<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/table.css">


    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Sidebar styles */
        .sidebar {
            height: 100vh;
            background-color: #0e1b4d;
            color: #fff;
            padding-top: 20px;
        }

        .sidebar-logo {
            text-align: center;
            margin-bottom: 30px;
            margin-top: -20px;
            margin-left: -20px;
        }

        .sidebar-logo img {
            width: 250px;
            height: 80px;
            background-color: #f0f5f0;
            border: 2px solid #ddd;

            border-radius: 0px;

        }


        .sidebar-item {
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .sidebar-item:hover {
            background-color: #454d55;
        }

        .sidebar-item i {
            margin-right: 10px;
        }

        /* Main content styles */
        .main-content {
            padding: 20px;
        }

        .content-title {
            margin-bottom: 20px;
            font-weight: bold;
        }

        .content-box {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
        }

        img {
            max-width: 200px;
            max-height: 150px;
        }

        /*Display */

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;


        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }

        .delete-btn {
            padding: 6px 10px;
            background-color: #ff5c5c;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .delete-btn:hover {
            background-color: #e64040;
        }

        body {
            background-color: #f0f5f0;
            margin: 0;
        }

        .card {
            border: none;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-title {
            font-size: 24px;
            margin-top: 10px;
        }

        .card-text {
            font-size: 14px;
            color: #555;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <div class="sidebar-logo">
                    <a href="index.php" class="button">

                    </a>
                </div>
                <div class="sidebar-item" onclick="showDashboard()">
                    <i class="fas fa-tachometer-alt"></i>Welecome Dashboard
                </div>
                <div class="sidebar-item" onclick="showUserMessages()">
                    <i class="fas fa-envelope"></i> Manage Event
                </div>

                <div class="sidebar-item" onclick="showAccounts()">
                    <i class="fas fa-users"></i>Add New Event
                </div>

                <div class="sidebar-item" onclick="showUpload()">
                    <i class="fas fa-users"></i>uploadvideo
                </div>




            </div>
            <!-- Main Content -->
            <div class="col-md-10 main-content" id="mainContent">
                <!-- Default content (Dashboard) -->
                <div class="content-box" id="dashboard">
                    <h2 class="content-title">Welecome To Enospire Dashboard</h2>
                    <!-- Add your dashboard content here -->
                    <p>We're thrilled to have you on board. This is your central hub for managing and orchestrating
                        outstanding events. The Welcome Dashboard provides a quick glance at key metrics, upcoming
                        events, and recent activities, ensuring you stay informed and in control. From here, you can
                        effortlessly navigate to "Manage Event" to fine-tune details of your existing events or jump
                        into the excitement of creating something new with "Add New Event." Your event management
                        journey begins here, and we're here to make it seamless and enjoyable. Let's create memorable
                        experiences together!</P>
                    <h3>Manage Event:</h3>
                    <ol>
                        <li>Allows users to view and make changes to existing events, offering tools for efficient event
                            management.</li>

                    </ol>

                    <h3>Add New Event:</h3>
                    <ol>
                        <li>Enables users to create and set up new events within the Enospire platform, likely involving
                            the input of event details.</li>

                    </ol>


                    <ol>

                    </ol>
                    <img src="img/ousl.png" alt="Logo">
                    <img src="img/logo2.png" alt="Logo">


                </div>
                <!-- User Messages content -->
                <div class="content-box" id="userMessages" style="display:none;">

                    <h2 class="content-title">Manage Events</h2>


                    <table>
                        <tr>


                        </tr>

                        <?php
                        // Include the contact functions file
                        include 'dashprocess.php';


                        ?>
                    </table>

                    <li class="buy-tickets"><a href="subscribers.txt">See subscribers</a></li>
                </div>



                <!-- Accounts content -->

                <div class="content-box" id="accounts" style="display: none;">
                    <h2 class="content-title">Add New Events</h2>
                    <p>The "Accounts" section in your dashboard serves as a centralized hub for managing and monitoring
                        the different accounts</p>


                    <div class="container mt-5">

                        <form action="process_form.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="event_description">Event Description:</label>
                                <textarea class="form-control" name="event_description" id="event_description" rows="5"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="speaker_name">Speaker Name:</label>
                                <input type="text" class="form-control" name="speaker_name" id="speaker_name" required>
                            </div>
                            <div class="form-group">
                                <label for="speaker_description">Speaker Description:</label>
                                <textarea class="form-control" name="speaker_description" id="speaker_description"
                                    rows="5" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="zoom_link">Zoom Link:</label>
                                <input type="text" class="form-control" name="zoom_link" id="zoom_link" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control" name="image" id="image" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </div>






    <script>
        function showDashboard() {
            hideAllContent();
            document.getElementById("dashboard").style.display = "block";
        }

        function showUserMessages() {
            hideAllContent();
            document.getElementById("userMessages").style.display = "block";
        }

        function showUpload() {
            hideAllContent();
            document.getElementById("upload").style.display = "block";
        }

        function showHelpDesk() {
            hideAllContent();
            document.getElementById("helpDesk").style.display = "block";
        }

        function showAccounts() {
            hideAllContent();
            document.getElementById("accounts").style.display = "block";
        }

        function showDiseaseSummary() {
            hideAllContent();
            document.getElementById("DiseaseSummary").style.display = "block";
        }

        function showTawk() {
            hideAllContent();
            document.getElementById("Tawk").style.display = "block";
        }

        function hideAllContent() {
            var contents = document.getElementsByClassName("content-box");
            for (var i = 0; i < contents.length; i++) {
                contents[i].style.display = "none";
            }
        }
    </script>
</body>

</html>