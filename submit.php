<?php
// Database connection parameters
$servername = "localhost";  // Usually localhost for local servers
$username = "root";         // Default MySQL username
$password = "";             // Default password is empty for XAMPP
$dbname = "portfolio";      // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data using POST method
$name = $_POST['name'];        // The 'name' field from the form
$email = $_POST['email'];      // The 'email' field from the form
$message = $_POST['message'];  // The 'message' field from the form

// Prepare the SQL query to insert the data using prepared statements
$stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message); // "sss" means 3 string parameters

// Execute the query
if ($stmt->execute()) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
