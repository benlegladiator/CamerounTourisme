<?php
include 'functions.php';
include 'send_email.php';

session_start();
require_login();

$site_id = isset($_POST['site_id']) ? $_POST['site_id'] : '';
$nombre_personnes = isset($_POST['nombre_personnes']) ? $_POST['nombre_personnes'] : '';
$date_reservation = isset($_POST['date_reservation']) ? $_POST['date_reservation'] : '';
$client_id = $_SESSION['client_id'];

if (!empty($site_id) && !empty($nombre_personnes) && !empty($date_reservation)) {
    $conn = db_connect();

    $sql = "INSERT INTO reservations (client_id, site_id, nombre_personnes, date_reservation) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiis", $client_id, $site_id, $nombre_personnes, $date_reservation);

    if ($stmt->execute()) {
        // Récupérer l'email et le nom du client depuis la base de données
        $sql = "SELECT email, nom FROM clients WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $client_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $client = $result->fetch_assoc();
        $client_email = $client['email'];
        $client_nom = $client['nom'];

        // Envoi de l'email de confirmation
        $to = $client_email;
        $subject = "Confirmation de Réservation";
        $body = "Bonjour " . htmlspecialchars($client_nom) . ",<br><br>Merci pour votre réservation au site " . htmlspecialchars($site['nom']) . ".<br>Votre réservation pour " . htmlspecialchars($nombre_personnes) . " personnes le " . htmlspecialchars($date_reservation) . " a été confirmée.<br><br>Cordialement,<br>L'équipe de gestion touristique.";
        sendConfirmationEmail($to, $subject, $body);

        header("Location: mes_reservations.php");
        exit();
    } else {
        $error_message = "Erreur lors de la réservation : " . $stmt->error;
        error_log("Erreur lors de la réservation : " . $stmt->error);
    }

    db_close($conn);
} else {
    $error_message = "Données manquantes pour la réservation.";
    header("Location: reservation.php?site_id=$site_id");
    exit();
}
?>
