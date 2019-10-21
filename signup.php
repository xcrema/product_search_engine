<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iwpprojectdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$pass = $_POST['password'];
$uname = $_POST['uname'];
$mail = $_POST['email'];

$sql = "INSERT INTO userentry (firstname, lastname, username, email, pass)"."
VALUES ('$fname', '$lname', '$uname', '$mail', '$pass')";

if ($conn->query($sql) === TRUE) {
    header("Location: engine.html");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>