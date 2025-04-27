<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? '';
    $text = $_POST['text'] ?? '';
    $type = $_POST['type'] ?? '';

    $stmt = $conn->prepare("UPDATE questions SET text = ?, type = ? WHERE id = ?");
    $stmt->execute([$text, $type, $id]);

    echo json_encode(['status' => 'success', 'message' => 'Question updated']);
}
?>
