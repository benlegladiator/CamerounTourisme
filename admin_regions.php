<?php
include 'functions.php';

session_start();


$conn = db_connect();

// Récupérer toutes les régions
$sql = "SELECT id, nom FROM regions";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $nom = $_POST['nom'];
        $sql = "INSERT INTO regions (nom) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nom);
        $stmt->execute();
    } elseif (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $sql = "UPDATE regions SET nom=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $nom, $id);
        $stmt->execute();
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM regions WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
    header("Location: admin_regions.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <title>Cameroun Tourisme</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-brand {
            text-transform: uppercase;
        }
        .table {
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .form-inline {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-inline input[type="text"] {
            margin-right: 10px;
        }
        .footer {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <nav class="cc-navbar navbar navbar-expand-lg position-fixed navbar-dark bg-dark w-100">
      <div class="container-fluid">
        <a class="navbar-brand text-uppercase mx-4 fw-bolder py-3" href="#">Tourisme Cameroun</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item pe-2">
              <a class="nav-link active" aria-current="page" href="admin_dashboard.php">Accueil Admin</a>
            </li>
            <li class="nav-item pe-2">
              <a class="btn btn-danger rounded-0" href="admin_dashboard.php">Déconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <section class="regions d-flex align-items-center justify-content-center min-vh-100 py-5">
      <div class="container">
          <h2 class="text-center mb-4">Régions</h2>
          <div class="table-responsive">
              <table class="table table-bordered table-striped">
                  <thead class="thead-dark">
                      <tr>
                          <th>ID</th>
                          <th>Nom</th>
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
                                      <td>
                                          <form action='admin_regions.php' method='post' class='d-inline'>
                                              <input type='hidden' name='id' value='" . htmlspecialchars($row["id"]). "'>
                                              <input type='text' name='nom' value='" . htmlspecialchars($row["nom"]). "' required class='form-control d-inline-block w-auto'>
                                              <input type='submit' name='edit' value='Modifier' class='btn btn-primary btn-sm'>
                                          </form>
                                          <form action='admin_regions.php' method='post' class='d-inline'>
                                              <input type='hidden' name='id' value='" . htmlspecialchars($row["id"]). "'>
                                              <input type='submit' name='delete' value='Supprimer' class='btn btn-danger btn-sm'>
                                          </form>
                                      </td>
                                    </tr>";
                          }
                      } else {
                          echo "<tr><td colspan='3' class='text-center'>Aucune région trouvée</td></tr>";
                      }
                      ?>
                  </tbody>
              </table>
          </div>
          <h3 class="text-center mt-4">Ajouter une nouvelle région</h3>
          <form action="admin_regions.php" method="post" class="form-inline justify-content-center">
              <label for="nom" class="mr-2">Nom :</label>
              <input type="text" id="nom" name="nom" class="form-control mr-2" required>
              <input type="submit" name="add" value="Ajouter" class="btn btn-success">
          </form>
      </div>
    </section>

    

    <section class="footer bg-dark text-light text-center py-5">
      <div class="container">
        <div class="row">
          <div class="col">
            <p>© 2024 Cameroun Tourisme. Tous droits réservés.</p>
          </div>
        </div>
      </div>
    </section>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
