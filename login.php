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

$pass = $_POST['password'];
$uname = $_POST['uname'];

$sql = "SELECT pass FROM userentry WHERE username = " ."'$uname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row["pass"] === $pass) {
        header("Location: engine.html");
        exit;
    }else {
        echo "Incorrect Password!!";
    }
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>