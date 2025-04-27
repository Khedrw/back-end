<?php
require 'db.php';

$stmt = $conn->query("SELECT * FROM quizzes");
$quizzes = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['status' => 'success', 'quizzes' => $quizzes]);
?>
