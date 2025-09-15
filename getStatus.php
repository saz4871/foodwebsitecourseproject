<?php
// getStatus.php

// Connect to your database (replace these values with your actual credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kitchen";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the kitchen status
$sql = "SELECT stats FROM status WHERE id = 1"; // Make sure id is an integer, no quotes needed
$result = $conn->query($sql);

// Check if the query returns a row
if ($result->num_rows > 0) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Access the "stats" column correctly
    if (isset($row['stats'])) {
        $status = $row['stats'];

        // Redirect based on the status
        if ($status == "open") {
            header("Location: open.html"); // Redirect to index.html if the status is open
            exit(); // Ensure no further code is executed after redirection
        } elseif ($status == "close") {
            header("Location: closed.html"); // Redirect to closed.html if the status is close
            exit(); // Ensure no further code is executed after redirection
        } else {
            // Handle case where the status is neither open nor close
            echo "Invalid status";
        }
    } else {
        echo "No status found";  // If 'stats' key is not found in the result
    }
} else {
    // Default case if no rows are found
    header("Location: closed.html"); // Redirect to closed.html if no status is found
    exit(); // Ensure no further code is executed after redirection
}

$conn->close();
?>
