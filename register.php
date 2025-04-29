<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!$email || !$password) {
        echo json_encode(['status' => 'error', 'message' => 'Email and password required']);
        exit;
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (email, password_hash, role, created_at) VALUES (?, ?, 'user', NOW())");
    try {
        $stmt->execute([$email, $password_hash]);
        echo json_encode(['status' => 'success', 'message' => 'User registered']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Email already exists']);
    }
}
?>
