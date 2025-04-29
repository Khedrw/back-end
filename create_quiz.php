<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $created_by = $_POST['created_by'] ?? '';

    $stmt = $conn->prepare("INSERT INTO quizzes (title, description, created_by, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->execute([$title, $description, $created_by]);

    echo json_encode(['status' => 'success', 'message' => 'Quiz created']);
}
?>
