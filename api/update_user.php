<?php
include '../db_config.php';

$id = $_POST['id'];
$name = $_POST['first_name'];
$email = $_POST['email'];

$sql = "UPDATE users SET first_name=?, email=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $first_name, $email, $id);
if ($stmt->execute()) {
    echo json_encode(['message' => 'User updated successfully']);
} else {
    echo json_encode(['error' => 'Failed to update user']);
}

$stmt->close();
$conn->close();
?>
