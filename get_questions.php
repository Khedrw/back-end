<?php
require 'db.php';

$quiz_id = $_GET['quiz_id'] ?? '';

$stmt = $conn->prepare("SELECT * FROM questions WHERE quizzes_id = ?");
$stmt->execute([$quiz_id]);
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['status' => 'success', 'questions' => $questions]);
?>
