<?php
include 'functions.php';

session_start();
// Assurez-vous que seuls les administrateurs peuvent accéder à cette page

$conn = db_connect();

if (isset($_GET['id'])) {
    $reservation_id = $_GET['id'];

    // Mettre à jour le statut de la réservation
    $sql = "UPDATE reservations SET status='validated' WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $reservation_id);

    if ($stmt->execute()) {
        header("Location: admin_reservations.php");
        exit();
    } else {
        echo "Erreur : " . $stmt->error;
    }

    db_close($conn);
} else {
    header("Location: admin_reservations.php");
    exit();
}
?>
