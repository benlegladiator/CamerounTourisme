<?php
include 'functions.php';
include 'send_email.php';

session_start();
require_login();

$site_id = isset($_POST['site_id']) ? $_POST['site_id'] : '';
$nombre_personnes = isset($_POST['nombre_personnes']) ? $_POST['nombre_personnes'] : '';
$date_reservation = isset($_POST['date_reservation']) ? $_POST['date_reservation'] : '';
$total_prix = isset($_POST['total_prix']) ? $_POST['total_prix'] : '';

if (empty($site_id) || empty($nombre_personnes) || empty($date_reservation) || empty($total_prix)) {
    $error_message = "Tous les champs doivent être remplis.";
    header("Location: reservation.php?site_id=$site_id");
    exit();
}

// Configuration PayPal
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; // URL du sandbox PayPal pour les tests
$paypal_id = 'ndongmoarthur9@gmail.com'; // Votre email PayPal

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <title>Cameroun Tourisme</title>
</head>
<body>
    <nav class="cc-navbar navbar navbar-expand-lg position-fixed navbar-dark w-100">
      <div class="container-fluid">
        <a class="navbar-brand text-upercase mx-4 fw-bolder py-3" href="#">Tourisme Cameroun</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item pe-2">
              <a class="nav-link active" aria-current="page" href="index">Aceuil</a>
            </li>
            <li class="nav-item pe-2">
              <a class="nav-link" href="regions.php">Regions</a>
            </li>
            <li class="nav-item pe-2">
              <a class="nav-link " href="sites.php" >sites_touristiques</a>
            </li>
            <li class="nav-item pe-2">
              <a class="nav-link " href="mes_reservations.php" >Mes Reservation</a>
            </li>
          </ul>
         
        </div>
      </div>
    </nav>
    <section class="banner d-flex justify-content-center align-item-center pt-5">
      <div class="container my-5 py-5">
        <div class="row">
          <div class="col-md-6"></div>
          <div class="col-md-6">
            <h1 class="text-capitalize py-3 redressed banner-desc">
              Efectuez votre paiement
            </h1>
            
          </div>
        </div>
      </div>
    </section>
    <form action="<?php echo $paypal_url; ?>" method="post">
        <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="item_name" value="Réservation pour <?php echo htmlspecialchars($site['nom']); ?>">
        <input type="hidden" name="item_number" value="<?php echo htmlspecialchars($site_id); ?>">
        <input type="hidden" name="amount" value="<?php echo htmlspecialchars($total_prix); ?>">
        <input type="hidden" name="currency_code" value="FCFA">
        <input type="hidden" name="return" value="http://127.0.0.1/gestion_tourisme/success.php">
        <input type="hidden" name="cancel_return" value="http://127.0.0.1/gestion_tourisme/cancel.php">
        <button type="submit">Payer avec PayPal</button>
    </form>
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
