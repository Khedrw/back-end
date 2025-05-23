<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {
        echo json_encode(['status' => 'success', 'message' => 'Login successful', 'user' => $user]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
    }
}
?>
