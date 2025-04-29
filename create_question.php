<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quiz_id = $_POST['quiz_id'] ?? '';
    $text = $_POST['text'] ?? '';
    $type = $_POST['type'] ?? 'mcq'; 

    $stmt = $conn->prepare("INSERT INTO questions (quiz_id, quizzes_id, text, type, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->execute([$quiz_id, $quiz_id, $text, $type]);

    echo json_encode(['status' => 'success', 'message' => 'Question created']);
}
?>
