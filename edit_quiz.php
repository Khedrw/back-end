<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? '';
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    $stmt = $conn->prepare("UPDATE quizzes SET title = ?, description = ? WHERE id = ?");
    $stmt->execute([$title, $description, $id]);

    echo json_encode(['status' => 'success', 'message' => 'Quiz updated']);
}
?>
