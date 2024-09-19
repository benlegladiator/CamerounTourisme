<?php
include 'functions.php';

$conn = db_connect();

$id = $_GET['id'];

$query = "DELETE FROM regions WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: admin.php");
exit();

db_close($conn);
?>
