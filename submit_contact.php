<?php
// Database configuration
$host = "localhost"; // Hostname
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "contact_form_db"; // Database name

// Establish connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert data into database
$sql = "INSERT INTO contact_info (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Data saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
