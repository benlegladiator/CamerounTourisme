<?php
include 'functions.php';
include 'send_email.php';

session_start();
require_login();

$site_id = isset($_GET['site_id']) ? $_GET['site_id'] : '';

if (empty($site_id)) {
    $error_message = "Aucun site touristique n'a été sélectionné.";
} else {
    $conn = db_connect();

    $sql = "SELECT nom, description, image, prix FROM sites_touristiques WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $site_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $site = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $site_id = $_POST['site_id'];
        $nombre_personnes = $_POST['nombre_personnes'];
        $date_reservation = $_POST['date_reservation'];

        if (empty($nombre_personnes) || empty($date_reservation)) {
            $error_message = "Tous les champs doivent être remplis.";
        } else {
            header("Location: facture.php?site_id=$site_id&nombre_personnes=$nombre_personnes&date_reservation=$date_reservation");
            exit();
        }

        db_close($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <title>Cameroun Tourisme</title>
    <script>
        function validateForm() {
            var nombre_personnes = document.getElementById("nombre_personnes").value;
            var date_reservation = document.getElementById("date_reservation").value;
            if (nombre_personnes == "" || date_reservation == "") {
                alert("Tous les champs doivent être remplis");
                return false;
            }
            return true;
        }
    </script>
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
              <a class="nav-link active" aria-current="page" href="index.php">Aceuil</a>
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
            <li class="nav-item pe-2">
              <a class="btn btn-order rounded-0 " href="admin_dashboard.php" >Admin</a>
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
              Explorez et Visitez des   <br> Nos Sites Touristiques
            </h1>
          </div>
        </div>
      </div>
    </section>
    <?php if (isset($error_message)) { echo "<p class='error'>$error_message</p>"; } ?>
    <?php if (!empty($site)) { ?>
    <section class="site-details d-flex align-items-center justify-content-center min-vh-100 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 mb-4">
                    <h2><?php echo htmlspecialchars($site['nom']); ?></h2>
                    <p><?php echo htmlspecialchars($site['description']); ?></p>
                    <img src="image/<?php echo htmlspecialchars($site['image']); ?>" class="img-fluid rounded mb-3" alt="<?php echo htmlspecialchars($site['nom']); ?>">
                    <p class="mt-3"><strong>Prix:</strong> <?php echo htmlspecialchars($site['prix']); ?> FCFA</p>
                </div>
                <div class="col-md-6 mb-10">
                    <form method="post" onsubmit="return validateForm();" class="bg-light p-4 rounded shadow-sm"><br><br><br>
                        <input type="hidden" name="site_id" value="<?php echo htmlspecialchars($site_id); ?>">
                        <div class="mb-3">
                            <label for="nombre_personnes" class="form-label">Nombre de personnes:</label>
                            <input type="number" class="form-control" id="nombre_personnes" name="nombre_personnes" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_reservation" class="form-label">Date de réservation:</label>
                            <input type="date" class="form-control" id="date_reservation" name="date_reservation" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Réserver</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

        
    <?php } ?>
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
