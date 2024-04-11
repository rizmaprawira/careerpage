<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }
        .info {
            margin-left: 20px;
            text-align: center;
            margin-top: 20px; /* Added margin-top */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hello There!</h2>
        <div class="info">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];
                if (!empty($name)) {
                    echo "<p>Thank you, $name I will get back to you shortly!</p>";
                } else {
                    echo "<p>Please fill in all fields.</p>";
                }
            } else {
                echo "<p>Form submission method not supported.</p>";
            }
            ?>
        </div>
    </div>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form contactme
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];   

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "guestdata";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL to insert data into table
    $sql = "INSERT INTO contactme (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

</body>
</html>


