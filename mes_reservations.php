<?php
include 'functions.php';

session_start();
require_login();

$conn = db_connect();

$client_id = $_SESSION['client_id'];
$sql = "SELECT reservations.id, sites_touristiques.nom AS site_nom, reservations.nombre_personnes, reservations.date_reservation 
        FROM reservations 
        JOIN sites_touristiques ON reservations.site_id = sites_touristiques.id 
        WHERE reservations.client_id = '$client_id'";
$result = $conn->query($sql);

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
              <a class="nav-link active" aria-current="page" href="index.php">Aceuil</a>
            </li>
            <li class="nav-item pe-2">
              <a class="nav-link " href="deconnexion.php" >Deconnexion</a>
            </li>
            
          </ul>
         
        </div>
      </div>
    </nav>
    
    <section class="reservations d-flex align-items-center justify-content-center min-vh-100 py-5">
      <div class="container">
          <h1 class="text-center mb-4">Mes réservations</h1>
          <?php if (isset($error_message)) { echo "<p class='error text-danger text-center'>$error_message</p>"; } ?>
          
          <div class="table-responsive">
              <table class="table table-bordered table-striped">
                  <thead class="thead-dark">
                      <tr>
                          <th>ID</th>
                          <th>Site Touristique</th>
                          <th>Nombre de Personnes</th>
                          <th>Date de Réservation</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                              echo "<tr>
                                      <td>" . htmlspecialchars($row["id"]). "</td>
                                      <td>" . htmlspecialchars($row["site_nom"]). "</td>
                                      <td>" . htmlspecialchars($row["nombre_personnes"]). "</td>
                                      <td>" . htmlspecialchars($row["date_reservation"]). "</td>
                                    </tr>";
                          }
                      } else {
                          echo "<tr><td colspan='4' class='text-center'>Aucune réservation trouvée</td></tr>";
                      }
                      db_close($conn);
                      ?>
                  </tbody>
              </table>
          </div>
      </div>
</section>

<section class="footer bg-dark text-light text-center py-5">
    <div class="container">
        <div class="row">
            <!-- Contenu du pied de page -->
        </div>
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

