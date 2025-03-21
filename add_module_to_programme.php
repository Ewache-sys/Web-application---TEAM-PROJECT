<?php
session_start();
include('db.php');

// Check if staff is logged in
if (!isset($_SESSION['staff_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $module_id = $_POST['module_id'];
    $programme_id = $_POST['programme_id'];

    // Check if the module is already added to the programme
    $stmt = $pdo->prepare("SELECT * FROM ProgrammeModules WHERE ProgrammeID = :programme_id AND ModuleID = :module_id");
    $stmt->execute(['programme_id' => $programme_id, 'module_id' => $module_id]);

    if ($stmt->rowCount() > 0) {
        echo "<p>This module is already added to the selected programme.</p>";
    } else {
        // Add module to programme
        $stmt = $pdo->prepare("INSERT INTO ProgrammeModules (ProgrammeID, ModuleID) VALUES (:programme_id, :module_id)");
        $stmt->execute(['programme_id' => $programme_id, 'module_id' => $module_id]);

        echo "<p>Module successfully added to the programme.</p>";
    }
}
?>
