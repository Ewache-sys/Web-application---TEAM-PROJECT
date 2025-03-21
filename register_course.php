<?php
session_start();
include('db.php');

// Check if the student is logged in
if (!isset($_SESSION['student_id'])) {
    header('Location: login.php');
    exit();
}

$student_id = $_SESSION['student_id'];
$module_id = $_GET['module_id'];

// Check if the student is already registered for the course
$sql = "SELECT * FROM ProgrammeModules WHERE ModuleID = :module_id AND StudentID = :student_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':module_id', $module_id);
$stmt->bindParam(':student_id', $student_id);
$stmt->execute();
$existing_registration = $stmt->fetch();

if ($existing_registration) {
    // Unregister
    $sql = "DELETE FROM InterestedStudents WHERE ProgrammeID = :programme_id AND StudentID = :student_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':programme_id', $programme_id);
    $stmt->bindParam(':student_id', $student_id);
    $stmt->execute();
    echo 'You have unregistered successfully.';
} else {
    // Register
    $sql = "INSERT INTO InterestedStudents (ProgrammeID, StudentID) VALUES (:programme_id, :student_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':programme_id', $programme_id);
    $stmt->bindParam(':student_id', $student_id);
    $stmt->execute();
    echo 'You have registered successfully.';
}
?>
