<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "max_handyman";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);

if ($_SERVER["REQUEST_METHOD"] == "POST" && $data) {
    $name = $data['name'];
    $email = $data['email'];
    $date = $data['date'];
    $time = $data['time'];

    $sql = "INSERT INTO appointments (name, email, date, time) VALUES ('$name', '$email', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment booked successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
