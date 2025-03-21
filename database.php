<?php
// Database credentials
$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "student_course_hub";

// Attempt connection
$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "You are connected! <br>";
}
?>