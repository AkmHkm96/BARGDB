<?php 
function OpenCon(){
$servername = "localhost";
$username = "ahfskpm";
$password = "bargdb123";
$dbname = "bardb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

return $conn;
}
?>