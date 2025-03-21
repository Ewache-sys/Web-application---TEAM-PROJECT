<?php
require 'db_connect.php';

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['course_name'] . " - " . $row['description'] . "</li>";
    }
} else {
    echo "<li>No courses available.</li>";
}
?>
