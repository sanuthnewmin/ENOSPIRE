<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Loading...</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #0B1126;
            font-family: Arial, sans-serif;
        }

        #loading-screen {
            text-align: center;
        }

        #loading-spinner {
            width: 64px; /* Adjust the width as needed */
            height: 64px;
            border-radius: 50%;
            border: 6px solid #fff;
            border-top: 6px solid #f39c12;
            animation: spin 1s linear infinite;
            background: url('img/logo2.png') no-repeat center center;
            background-size: 50%; /* Adjust the size of the image */
        }

        p {
            margin-top: 20px;
            font-size: 18px;
            color: #ffffff;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div id="loading-screen">
        <div id="loading-spinner"></div>
        <p>Please...</p>
    </div>

    <script>
        window.addEventListener('load', function () {
            setTimeout(function () {
                window.location.href = 'home.php';
            }, 2000); // Adjust the time (in milliseconds) as needed
        });
    </script>
</body>
</html>
