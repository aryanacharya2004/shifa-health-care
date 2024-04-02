<?php
 
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
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql ="INSERT INTO service_form (name, email,mobile,created_at) VALUES('$name', '$email', '$mobile', NOW()) "; 



    if ($conn->query($sql) === true) 
{ 
    echo "Records inserted successfully."; 
} 
else
{ 
    echo "ERROR: Could not able to execute $sql. "
           .$mysqli->error; 
} 
  
mysqli_close($conn);
 
?>

