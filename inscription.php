<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    $conn = db_connect();

    $sql = "INSERT INTO clients (nom, email, mot_de_passe) VALUES ('$nom', '$email', '$mot_de_passe')";

    if ($conn->query($sql) === TRUE) {
        // Rediriger vers la page de connexion après une inscription réussie
        header("Location: connexion.php");
        exit();
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    db_close($conn);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
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
              <a class="btn btn-order rounded-0 " href="connexion.php" >Connexion</a>
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
              Inscrivez-Vous Pour Effectuer <br> Une Reservation
            </h1>
            
          </div>
        </div>
      </div>
    </section>
    <section class="container mt-5">
      <form action="inscription.php" method="post" class="needs-validation" novalidate>
          <div class="form-group">
              <label for="nom">Nom :</label>
              <input type="text" class="form-control" id="nom" name="nom" required>
              <div class="invalid-feedback">
                  Veuillez entrer votre nom
              </div>
          </div>
          <div class="form-group">
              <label for="email">Email :</label>
              <input type="email" class="form-control" id="email" name="email" required>
              <div class="invalid-feedback">
                  Veuillez entrer une adresse email valide.
              </div>
          </div>
          <div class="form-group">
              <label for="mot_de_passe">Mot de passe :</label>
              <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
              <div class="invalid-feedback">
                  Veuillez entrer un mot de passe.
              </div>
          </div><br>
          <button type="submit" class="btn btn-primary">S'inscrire</button>
          <br><br>
      </form>
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
