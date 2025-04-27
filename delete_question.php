<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? '';

    $stmt = $conn->prepare("DELETE FROM questions WHERE id = ?");
    $stmt->execute([$id]);

    echo json_encode(['status' => 'success', 'message' => 'Question deleted']);
}
?>
