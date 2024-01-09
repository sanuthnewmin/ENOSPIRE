<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertisement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .popup {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .close-btn {
            cursor: pointer;
            margin-top: 10px;
            color: #007BFF;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="popup">
        <p>This is your pop-up advertisement content.</p>
        <p class="close-btn" onclick="closePopup()">Close</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function closePopup() {
            $('.popup').fadeOut();
        }
    </script>
</body>
</html>
