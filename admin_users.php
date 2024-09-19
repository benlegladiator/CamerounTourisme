<?php
include 'functions.php';

session_start();
 // Assurez-vous que seuls les administrateurs peuvent accéder à cette page

$conn = db_connect();

// Récupérer tous les utilisateurs
$sql = "SELECT id, nom, email, telephone FROM clients";
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
              <a class="nav-link" href="admin_dashboard.php">Acceuil_Admin</a>
            </li>
            <li class="nav-item pe-2">
              <a class="btn btn-order rounded-0 " href="admin_logout.php" >Deconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <section class="users d-flex align-items-center justify-content-center min-vh-100 py-5">
      <div class="container">
          <h2 class="text-center mb-4">Utilisateurs</h2>
          <div class="table-responsive">
              <table class="table table-bordered table-striped">
                  <thead class="thead-dark">
                      <tr>
                          <th>ID</th>
                          <th>Nom</th>
                          <th>Email</th>
                          <th>Téléphone</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                              echo "<tr>
                                      <td>" . htmlspecialchars($row["id"]). "</td>
                                      <td>" . htmlspecialchars($row["nom"]). "</td>
                                      <td>" . htmlspecialchars($row["email"]). "</td>
                                      <td>" . htmlspecialchars($row["telephone"]). "</td>
                                      <td>
                                          <a href='edit_user.php?id=" . htmlspecialchars($row["id"]). "' class='btn btn-primary btn-sm'>Modifier</a>
                                          <a href='delete_user.php?id=" . htmlspecialchars($row["id"]). "' class='btn btn-danger btn-sm'>Supprimer</a>
                                      </td>
                                    </tr>";
                          }
                      } else {
                          echo "<tr><td colspan='5' class='text-center'>Aucun utilisateur trouvé</td></tr>";
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
