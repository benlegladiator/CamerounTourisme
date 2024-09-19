<?php
include 'functions.php';

session_start();
require_admin_login();

$conn = db_connect();

if (isset($_GET['id'])) {
    $reservation_id = $_GET['id'];

    // Récupérer les détails de la réservation
    $sql = "SELECT * FROM reservations WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $reservation_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $reservation = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre_personnes = $_POST['nombre_personnes'];
        $date_reservation = $_POST['date_reservation'];

        // Mettre à jour la réservation
        $sql = "UPDATE reservations SET nombre_personnes=?, date_reservation=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isi", $nombre_personnes, $date_reservation, $reservation_id);

        if ($stmt->execute()) {
            header("Location: admin_dashboard.php");
            exit();
        } else {
            echo "Erreur : " . $stmt->error;
        }
    }
} else {
    header("Location: admin_dashboard.php");
    exit();
}

db_close($conn);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
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
              <a class="nav-link active" aria-current="page" href="admin_dashboard.php">Aceuil Admin</a>
            </li>
            <li class="nav-item pe-2">
              <a class="btn btn-order rounded-0 " href="admin_dashboard.php" >Deconection</a>
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
              Faites vos Modifications
            </h1>
            
          </div>
        </div>
      </div>
    </section>
    <section class="edit-reservation d-flex align-items-center justify-content-center min-vh-100 py-5">
      <div class="container">
          <h1 class="text-center mb-4">Modifier Réservation</h1>
          <form action="edit_reservation.php?id=<?php echo htmlspecialchars($reservation_id); ?>" method="post" class="bg-light p-5 rounded shadow-sm">
              <div class="mb-3">
                  <label for="nombre_personnes" class="form-label">Nombre de personnes :</label>
                  <input type="number" id="nombre_personnes" name="nombre_personnes" value="<?php echo htmlspecialchars($reservation['nombre_personnes']); ?>" required class="form-control">
              </div>
              <div class="mb-3">
                  <label for="date_reservation" class="form-label">Date de la visite :</label>
                  <input type="date" id="date_reservation" name="date_reservation" value="<?php echo htmlspecialchars($reservation['date_reservation']); ?>" required class="form-control">
              </div>
              <input type="submit" value="Modifier" class="btn btn-primary">
          </form>
      </div>
</section>

<section class="footer bg-dark text-light text-center py-5">
    <div class="container">
        <div class="row">
            <!-- Contenu du pied de page -->
        </div>
    </div>
</section>

    
    </section>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/js/bootstrap.bundle.min.js" ></script>
</body>
</html>
