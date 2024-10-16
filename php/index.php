<?php
$servername = "database";
$username = "root";
$password = "123";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT firstname, empnumber FROM natwest";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Records</title>

    <!-- Inline CSS for Background Styling -->
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('/docker/php/assets/background.jpg');  /* Path to your image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            color: white;
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            background: rgba(0, 0, 0, 0.6);  /* Optional: Black overlay for better text contrast */
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h1>Student Records</h1>
    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<p>- Name: " . $row["firstname"] . " | emp Number: " . $row["empnumber"] . "</p>";
            }
        } else {
            echo "<p>No results found</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
