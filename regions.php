<?php
include 'functions.php';

$conn = db_connect();

$query = "SELECT * FROM regions";
$result = $conn->query($query);

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
   
    </section>
    <section class="banner d-flex justify-content-center align-item-center pt-5">
      <div class="container my-5 py-5">
        <div class="row">
          <div class="col-md-6"></div>
          <div class="col-md-6">
            <h1 class="text-capitalize py-3 redressed banner-desc">
              Explorez et Visitez des   <br> Nos Regions  
            </h1>
            <p>
              <a href="inscription.php"><button class="btn btn-order btn-lg me-5 rounded-0 merriweather " >Inscription</button></a>
              <a href="connexion.php"><button class="btn btn-outline-info rounded-0 merriweather" >Connexion</button></a>
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="classement">
      <div class="container">
          <div class="row">
              <?php 
              $count = 0;
              while($row = $result->fetch_assoc()): 
                  if ($count % 2 == 0 && $count != 0) {
                      echo '</div><div class="row">';
                  }
              ?>
                  <div class="col-md-6 mb-4">
                      <div class="card" style="max-width: 100%;">
                          <div class="row g-0">
                              <div class="col-md-4">
                                  <img src="image/<?php echo $row['image']; ?>" class="img-fluid" alt="<?php echo $row['nom']; ?>">
                              </div>
                              <div class="col-md-8">
                                  <div class="card-body">
                                      <h5 class="card-title"><?php echo $row['nom']; ?></h5>
                                      <p class="card-text"><?php echo $row['description']; ?></p>
                                      <a href="sites_touristiques.php?region_id=<?php echo $row['id']; ?>" class="btn btn-primary">Visiter</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              <?php 
                  $count++;
              endwhile; 
              ?>
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