<?php
include 'db_config.php';

$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$users = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($users);

$stmt->close();
$conn->close();
?>
