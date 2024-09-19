<?php
include 'functions.php';

session_start();
// Assurez-vous que seuls les administrateurs peuvent accéder à cette page

$conn = db_connect();

// Récupérer toutes les réservations
$sql = "SELECT reservations.id, clients.nom AS client_nom, sites_touristiques.nom AS site_nom, sites_touristiques.prix, reservations.nombre_personnes, reservations.date_reservation, reservations.status 
        FROM reservations 
        JOIN clients ON reservations.client_id = clients.id 
        JOIN sites_touristiques ON reservations.site_id = sites_touristiques.id";
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
              <a class="nav-link" href="admin_reservations.php">Reservations</a>
            </li>
            <li class="nav-item pe-2">
              <a class="nav-link " href="admin_sites.php" >sites_touristiques</a>
            </li>
            <li class="nav-item pe-2">
              <a class="nav-link " href="admin_regions.php" >Regions</a>
            </li>
            <li class="nav-item pe-2">
              <a class="nav-link " href="admin_users.php" >Utilisateurs</a>
            </li>
            <li class="nav-item pe-2">
              <a class="btn btn-order rounded-0 " href="admin_logout.php" >Deconnexion</a>
            </li>
          </ul>
         
        </div>
      </div>
    </nav>
    
    <section class="container my-5 full-height">
        <div>
            <h2 class="text-center mb-4">Réservations</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Site Touristique</th>
                            <th>Prix</th>
                            <th>Nombre de Personnes</th>
                            <th>Date de Réservation</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row["id"]). "</td>
                                    <td>" . htmlspecialchars($row["client_nom"]). "</td>
                                    <td>" . htmlspecialchars($row["site_nom"]). "</td>
                                    <td>" . htmlspecialchars($row["prix"]). " FCFA</td>
                                    <td>" . htmlspecialchars($row["nombre_personnes"]). "</td>
                                    <td>" . htmlspecialchars($row["date_reservation"]). "</td>
                                    <td>" . htmlspecialchars($row["status"]). "</td>
                                    <td>
                                        <a href='edit_reservation.php?id=" . htmlspecialchars($row["id"]). "' class='btn btn-sm btn-warning'>Modifier</a>
                                        <a href='delete_reservation.php?id=" . htmlspecialchars($row["id"]). "' class='btn btn-sm btn-danger'>Annuler</a>
                                        <a href='validate_reservation.php?id=" . htmlspecialchars($row["id"]). "' class='btn btn-sm btn-success'>Valider</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>Aucune réservation trouvée</td></tr>";
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
          
        </div>
      </div>
    </section>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/js/bootstrap.bundle.min.js" ></script>
</body>
</html>

    
   