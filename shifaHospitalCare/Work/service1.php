<?php

// Check if all required fields are filled
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['mobile']) || empty($_POST['service'])) {
    echo "All fields are required.";
    exit; // Stop further execution
}

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$service = $_POST['service'];

$host = 'localhost';
$user = 'root';
$password = '@mansi811';
$database = 'form_data';

// Create connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL statement using prepared statements
$sql = "INSERT INTO service_form (name, email, mobile, created_at) VALUES (?, ?, ?, NOW())";

// Prepare the statement
$stmt = mysqli_prepare($conn, $sql);

// Bind parameters
mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $mobile);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
    echo "Records inserted successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
