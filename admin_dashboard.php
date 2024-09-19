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
              <a class="btn btn-order rounded-0 " href="admin_logout.php" >Deconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="admin-home d-flex align-items-center justify-content-center min-vh-100 py-5">
      <div class="container text-center">
          <div class="admin-buttons bg-light p-5 rounded shadow-sm">
              <h1 class="mb-4">Bienvenue, Administrateur</h1>
              <a href="admin_reservations.php" class="btn btn-primary btn-lg mb-2">Réservations</a>
              <a href="admin_utilisateurs.php" class="btn btn-secondary btn-lg mb-2">Utilisateurs</a>
              <a href="admin_regions.php" class="btn btn-success btn-lg mb-2">Région</a>
              <a href="admin_sites.php" class="btn btn-info btn-lg mb-2">Sites</a>
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
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
