<?php
include 'functions.php';

session_start();


$conn = db_connect();

// Récupérer tous les sites touristiques
$sql = "SELECT id, nom, region_id FROM sites_touristiques";
$result = $conn->query($sql);

// Récupérer toutes les régions pour le formulaire
$sql_regions = "SELECT id, nom FROM regions";
$result_regions = $conn->query($sql_regions);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $nom = $_POST['nom'];
        $region_id = $_POST['region_id'];
        $sql = "INSERT INTO sites_touristiques (nom, region_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $nom, $region_id);
        $stmt->execute();
    } elseif (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $region_id = $_POST['region_id'];
        $sql = "UPDATE sites_touristiques SET nom=?, region_id=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sii", $nom, $region_id, $id);
        $stmt->execute();
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM sites_touristiques WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
    header("Location: admin_sites.php");
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
<section class="tourist-sites d-flex align-items-center justify-content-center min-vh-100 py-5">
    <div class="container">
        <h2 class="text-center mb-4">Sites Touristiques</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Région</th>
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
                                    <td>" . htmlspecialchars($row["region_id"]). "</td>
                                    <td>
                                        <form action='admin_sites.php' method='post' class='d-inline'>
                                            <input type='hidden' name='id' value='" . htmlspecialchars($row["id"]). "'>
                                            <input type='text' name='nom' value='" . htmlspecialchars($row["nom"]). "' required class='form-control d-inline-block w-auto'>
                                            <select name='region_id' required class='form-control d-inline-block w-auto'>";
                                            while($region = $result_regions->fetch_assoc()) {
                                                echo "<option value='" . htmlspecialchars($region["id"]). "' " . ($region["id"] == $row["region_id"] ? "selected" : "") . ">" . htmlspecialchars($region["nom"]). "</option>";
                                            }
                                            echo "</select>
                                            <input type='submit' name='edit' value='Modifier' class='btn btn-primary btn-sm'>
                                        </form>
                                        <form action='admin_sites.php' method='post' class='d-inline'>
                                            <input type='hidden' name='id' value='" . htmlspecialchars($row["id"]). "'>
                                            <input type='submit' name='delete' value='Supprimer' class='btn btn-danger btn-sm'>
                                        </form>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>Aucun site touristique trouvé</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <h3 class="text-center mt-4">Ajouter un nouveau site touristique</h3>
        <form action="admin_sites.php" method="post" class="form-inline justify-content-center">
            <label for="nom" class="mr-2">Nom :</label>
            <input type="text" id="nom" name="nom" class="form-control mr-2" required>
            <label for="region_id" class="mr-2">Région :</label>
            <select id="region_id" name="region_id" class="form-control mr-2" required>
                <?php
                while($region = $result_regions->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($region["id"]). "'>" . htmlspecialchars($region["nom"]). "</option>";
                }
                ?>
            </select>
            <input type="submit" name="add" value="Ajouter" class="btn btn-success">
        </form>
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
