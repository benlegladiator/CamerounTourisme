<?php
include 'functions.php';

session_start();
require_admin_login();

$conn = db_connect();

if (isset($_GET['id'])) {
    $reservation_id = $_GET['id'];

    // Supprimer la réservation
    $sql = "DELETE FROM reservations WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $reservation_id);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Erreur : " . $stmt->error;
    }
} else {
    header("Location: admin_dashboard.php");
    exit();
}

db_close($conn);
?>
