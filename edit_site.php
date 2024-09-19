<?php
include 'functions.php';

$conn = db_connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $region_id = $_POST['region_id'];
    $prix = $_POST['prix'];

    $query = "UPDATE sites_touristiques SET nom = ?, description = ?, image = ?, region_id = ?, prix = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssidi", $nom, $description, $image, $region_id, $prix, $id);
    $stmt->execute();

    header("Location: admin.php");
    exit();
} else {
    $id = $_GET['id'];
    $query = "SELECT * FROM sites_touristiques WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $site = $result->fetch_assoc();
}

db_close($conn);
?>

<!DOCTYPE html>
<html>
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
   
    <section class="edit-site d-flex align-items-center justify-content-center min-vh-100 py-5">
      <div class="container">
          <h1 class="text-center mb-4">Mes réservations</h1>
          <form action="edit_site.php" method="post" class="bg-light p-5 rounded shadow-sm">
              <input type="hidden" name="id" value="<?php echo $site['id']; ?>">
              <div class="mb-3">
                  <label for="nom" class="form-label">Nom :</label>
                  <input type="text" id="nom" name="nom" value="<?php echo $site['nom']; ?>" required class="form-control">
              </div>
              <div class="mb-3">
                  <label for="description" class="form-label">Description :</label>
                  <textarea id="description" name="description" required class="form-control"><?php echo $site['description']; ?></textarea>
              </div>
              <div class="mb-3">
                  <label for="image" class="form-label">Image :</label>
                  <input type="text" id="image" name="image" value="<?php echo $site['image']; ?>" required class="form-control">
              </div>
              <div class="mb-3">
                  <label for="region_id" class="form-label">Région :</label>
                  <input type="number" id="region_id" name="region_id" value="<?php echo $site['region_id']; ?>" required class="form-control">
              </div>
              <div class="mb-3">
                  <label for="prix" class="form-label">Prix :</label>
                  <input type="number" id="prix" name="prix" value="<?php echo $site['prix']; ?>" required class="form-control">
              </div>
              <button type="submit" class="btn btn-primary">Modifier</button>
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
