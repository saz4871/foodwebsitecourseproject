<?php
// Common Database Configuration
function getDbConnection($dbname) {
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "contact_form_db";
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Handle Kitchen Status Update (status.php functionality)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action1'])) {
    $value = $_POST['action1'];
    $conn = getDbConnection("kitchen");
    $stmt = $conn->prepare("UPDATE status SET stats = ? WHERE id = 1");
    $stmt->bind_param("s", $value);

    if ($stmt->execute()) {
        if ($value === "open") {
            echo "<script>alert('KITCHEN IS OPEN'); window.location.href = 'password.html';</script>";
        } elseif ($value === "close") {
            echo "<script>alert('KITCHEN IS CLOSED'); window.location.href = 'password.html';</script>";
        }
    } else {
        echo "<script>alert('Error updating status.'); window.location.href = 'password.html';</script>";
    }

    $stmt->close();
    $conn->close();
}

// Handle Contact Form Submission (submit_contact.php functionality)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $conn = getDbConnection("contact_form_db");
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact_info (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
                alert('Data saved successfully!');
                window.location.href = 'index.html';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
