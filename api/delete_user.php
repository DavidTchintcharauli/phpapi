<?php
include 'db_config.php';

$id = $_POST['id'];

$sql = "DELETE FROM users WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    echo json_encode(['message' => 'User deleted successfully']);
} else {
    echo json_encode(['error' => 'Failed to delete user']);
}

$stmt->close();
$conn->close();
?>
