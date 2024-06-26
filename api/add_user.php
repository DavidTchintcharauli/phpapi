<?php
include '../db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['first_name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (first_name, email) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $email);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'User added successfully']);
    } else {
        echo json_encode(['error' => 'Failed to add user']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'Only POST requests are allowed']);
}
?>
