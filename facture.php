<?php
include 'functions.php';
include 'send_email.php';

session_start();
require_login();

$site_id = isset($_GET['site_id']) ? $_GET['site_id'] : '';
$nombre_personnes = isset($_GET['nombre_personnes']) ? $_GET['nombre_personnes'] : '';
$date_reservation = isset($_GET['date_reservation']) ? $_GET['date_reservation'] : '';

if (empty($site_id) || empty($nombre_personnes) || empty($date_reservation)) {
    $error_message = "Tous les champs doivent être remplis.";
    header("Location: reservation.php?site_id=$site_id");
    exit();
} else {
    $conn = db_connect();

    $sql = "SELECT nom, prix, image FROM sites_touristiques WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $site_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $site = $result->fetch_assoc();

    $total_prix = $site['prix'] * $nombre_personnes;

    db_close($conn);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <title>Cameroun Tourisme</title>
    <style>
        .print-button {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .site-image {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

    <?php if (isset($error_message)) { echo "<p class='error'>$error_message</p>"; } ?>
    
    <button type="button" class="btn btn-info btn-lg print-button" onclick="window.print();">Imprimer</button>

    <section class="reservation-details d-flex align-items-center justify-content-center min-vh-100 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 mb-4">
                    <div class="bg-light p-4 rounded shadow-sm">
                        <h2><?php echo htmlspecialchars($site['nom']); ?></h2>
                        <img src="image/<?php echo htmlspecialchars($site['image']); ?>" alt="Image du site touristique" class="img-fluid mb-3 site-image">
                        <p><strong>Nombre de personnes:</strong> <?php echo htmlspecialchars($nombre_personnes); ?></p>
                        <p><strong>Date de réservation:</strong> <?php echo htmlspecialchars($date_reservation); ?></p>
                        <p><strong>Prix par personne:</strong> <?php echo htmlspecialchars($site['prix']); ?> FCFA</p>
                        <p><strong>Total:</strong> <?php echo htmlspecialchars($total_prix); ?> FCFA</p>
                    </div>
                    <div class="mt-4 d-flex justify-content-between">
                        <form action="paypal_payment.php" method="post" style="display:inline;">
                            <input type="hidden" name="site_id" value="<?php echo htmlspecialchars($site_id); ?>">
                            <input type="hidden" name="nombre_personnes" value="<?php echo htmlspecialchars($nombre_personnes); ?>">
                            <input type="hidden" name="date_reservation" value="<?php echo htmlspecialchars($date_reservation); ?>">
                            <input type="hidden" name="total_prix" value="<?php echo htmlspecialchars($total_prix); ?>">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <img src="image/paypal.jpeg" alt="PayPal" style="height: 24px; margin-right: 5px;">
                                Payer avec PayPal
                            </button>
                        </form>
                        <form action="cash_payment.php" method="post" style="display:inline;">
                            <input type="hidden" name="site_id" value="<?php echo htmlspecialchars($site_id); ?>">
                            <input type="hidden" name="nombre_personnes" value="<?php echo htmlspecialchars($nombre_personnes); ?>">
                            <input type="hidden" name="date_reservation" value="<?php echo htmlspecialchars($date_reservation); ?>">
                            <input type="hidden" name="total_prix" value="<?php echo htmlspecialchars($total_prix); ?>">
                            <button type="submit" class="btn btn-secondary btn-lg">
                                <img src="image/cash.jpeg" alt="Cash" style="height: 24px; margin-right: 5px;">
                                Payer par Cash
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer bg-dark text-light text-center py-5">
      <div class="container">
        <div class="row">
          
        </div>
      </div>
    </section>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/js/bootstrap.bundle.min.js" ></script>
</body>
</html>
