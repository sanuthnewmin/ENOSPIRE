<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        .card {
            width: 350px;
            padding: 20px;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <?php
    require_once('config.php');
    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT user_id, username, password FROM users WHERE email = ?";

        // Use a prepared statement to protect against SQL injection
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                $stmt->bind_result($user_id, $username, $hashed_password);
                $stmt->fetch();

                if (password_verify($password, $hashed_password)) {
                    session_start();
                    $_SESSION["user_id"] = $user_id;
                    $_SESSION["username"] = $username;
                    header("Location: dashboard.php");
                    exit;
                } else {
                    echo "Invalid password.";
                }
            } else {
                echo "User not found.";
            }

            $stmt->close();
        }
    }

    $conn->close();
    ?>

    <div class="card">
        <div class="logo">
            <!-- Placeholder for your logo -->
            <img src="img/logo2.png" alt="Logo" width="170" height="80">
        </div>
        <div class="container">
            <h2 class="text-center">Admin Login</h2>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" class="btn btn- btn-block" style="background-color: #0e1b4d; color: #fff;">Login</button>
                <a href="register.php">I have't Account</a>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
