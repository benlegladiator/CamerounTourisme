<?php
include 'functions.php';

$conn = db_connect();

$query = "SELECT * FROM regions LIMIT 4";
$result = $conn->query($query);

db_close($conn);
?>

<!doctype html>
<html lang="en">
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
              <a class="nav-link active" aria-current="page" href="#">Aceuil</a>
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
    <section class="banner d-flex justify-content-center align-item-center pt-5">
      <div class="container my-5 py-5">
        <div class="row">
          <div class="col-md-6"></div>
          <div class="col-md-6">
            <h1 class="text-capitalize py-3 redressed banner-desc">
              Explorez et Visitez des   <br>Sites Touristiques Exceptionnels  <br> Au Cameoun
            </h1>
            <p>
              <a href="inscription.php"><button class="btn btn-order btn-lg me-5 rounded-0 merriweather " >Inscription</button></a>
              <a href="connexion.php"><button class="btn btn-outline-info rounded-0 merriweather" >Connexion</button></a>
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="available merriweather py-5">
      <div class="container">
        <div class="row">
          <div class="card my-3 border-0 rounded-0">
            <div class="row g-0">
              <div class="col-md-6">
                <img src="image/sao.jpeg" class="img-fluid " alt="...">
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <h1 class="card-title">Maison Toit en paille</h1> 
                  <p class="card-text">Les maisons avec un toit en paille, particulièrement dans les régions du nord, sont souvent appréciées pour leur charme rustique et leurs avantages écologiques. Voici quelques points clés sur ces constructions :

Isolation Thermique et Phonique : La paille est un excellent isolant naturel, offrant une bonne isolation thermique et phonique1. Cela permet de maintenir une température agréable à l’intérieur, tout en réduisant les bruits extérieurs.
Durabilité et Écologie : Utiliser la paille comme matériau de construction est une option durable et écologique. La paille est renouvelable et a une faible empreinte carbone2.
Protection Contre l’Humidité : Il est crucial de protéger les maisons en paille de l’humidité. Cela peut être fait en utilisant des enduits appropriés et en s’assurant que la structure est bien ventilée1.
Esthétique et Tradition : Les toits en paille apportent une touche esthétique traditionnelle et sont souvent utilisés dans des constructions qui cherchent à préserver un style architectural local3.
Si vous envisagez de construire ou de rénover une maison avec un toit en paille, il est recommandé de faire appel à des professionnels qualifiés pour garantir la qualité et la durabilité de la construction.</p> <br><br>
                  <p class="card-text"> <a href="regions.php" class="text-muted btn"><button class="btn btn-outline-info rounded-0 merriweather">Visitez Nous</button></a> </p>
                </div>
              </div>
            </div>

            <div class="card my-3 border-0 rounded-0">
              <div class="row g-0">
               
                <div class="col-md-6">
                  <div class="card-body">
                    <h1 class="card-title">Lac Baleng</h1>
                    <p class="card-text">Le Lac Baleng est un magnifique lac de cratère situé dans la région de l’Ouest du Cameroun, près de Bafoussam12. Voici quelques informations intéressantes à son sujet :

Géographie : Le lac se trouve à environ 1 374 mètres d’altitude et occupe un cratère de 800 mètres de large2. Il est entouré par une forêt d’eucalyptus, ce qui ajoute à son charme naturel1.
Histoire et Culture : Le Lac Baleng est considéré comme un sanctuaire traditionnel et est inscrit sur la liste du patrimoine national en tant qu’élément du patrimoine culturel immatériel depuis 20201. Il est souvent visité pour ses aspects culturels et spirituels.
Activités : Les visiteurs peuvent profiter de la beauté naturelle du lac, faire des randonnées autour de ses rives, et découvrir la riche biodiversité de la région2.
Accès : Le lac est situé à environ 6 kilomètres du centre-ville de Bafoussam, ce qui le rend facilement accessible pour une excursion d’une journée3.
Avez-vous déjà visité le Lac Baleng ou envisagez-vous de le faire prochainement ?</p>
                    <p class="card-text"> <a href="regions.php" class="text-muted btn"><button class="btn btn-outline-info rounded-0 merriweather">Visitez Nous</button></a> </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="image/lac.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="image/plage2.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="image/lac.jpg" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>                
              </div>

              <div class="card my-3 border-0 rounded-0">
                <div class="row g-0">
                  <div class="col-md-6">
                    <img src="img/31.jpg" class="img-fluid " alt="...">
                  </div>
                  <div class="col-md-6">
                    <div class="card-body">
                      <h1 class="card-title">Hilton Hotel</h1>
                      <p class="card-text">Génération de vos réponses…

Envoyé par Copilot :
Le Hilton Hotel Yaoundé est un hôtel cinq étoiles situé au cœur du quartier des affaires de Yaoundé, sur le Boulevard du 20 Mai1. Voici quelques points clés sur cet établissement :

Installations et Services : L’hôtel propose une piscine extérieure, une salle de sport avec bain à remous et sauna, ainsi que deux courts de tennis et un terrain de squash1. Il dispose également de cinq restaurants et bars, dont Le Panoramique au 11e étage, offrant une vue imprenable sur la ville1.
Chambres et Suites : Les chambres et suites sont climatisées et insonorisées, avec un balcon privé et un coin salon équipé d’une télévision à écran plat1. Le Wi-Fi est disponible gratuitement dans tout l’hôtel1.
Restauration : Le restaurant Le Safoutier propose des buffets internationaux pour le petit-déjeuner, le déjeuner et le dîner1. Vous pouvez également déguster des plats français inspirés de la brasserie au restaurant Le Pachy, ou profiter du bar à sushis au 11e étage1.
Activités et Loisirs : En plus des installations sportives, l’hôtel offre une aire de jeux pour enfants et un centre d’affaires1. Il est également proche de plusieurs attractions locales, comme le Musée National de Yaoundé et le marché de Mfoundi1.</p>
                      <p class="card-text"> <a href="regions.php" class="text-muted btn"><button class="btn btn-outline-info rounded-0 merriweather">Visitez Nous</button></a> </p>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>

    </section>
    <section class="cc-menu merriweather  py-5">
      <div class="container">
        <div class="row text-light">
          <h3 class="text-center text-light merriweather">Quelques sites</h3>
          <div class="card bg-transparent text-center">
            <div class="card-header redressed fs-4">
              <ul class="nav nav-tabs justify-content-center card-header-tabs">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="true" href="regions.php">1 Choisir la Region</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="sites_touristiques.php">2 Choisir le site</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled text-light" href="reservation.php" tabindex="-1" aria-disabled="true">3 Reserver la visite</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 g-4">
          <div class="col">
            <div class="card">
              <img src="image/hilto.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="image/chut.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="image/lac.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional contentThis is a longer card with supporting text below as a natural lead-in to additional content.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="image/bangomuseum.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<section class="cc-carousel merriweather bg-dark text-light text-center py-5 ">
  <div class="container py-5 my-5">
    <div class="row">
      <h1 class="text-upercase">
          Quelques Lieux de detente</h1>
          <div class="col pb-5">Défis Actuels
Aujourd’hui, les Pygmées font face à de nombreux défis, notamment la précarisation croissante de leur
 mode de vie et la menace à leur culture due à la déforestation et 
à la sédentarisation forcée3. De nombreux efforts sont faits pour préserver leur culture et améliorer
 leurs conditions de vie, mais ils restent souvent marginalisés sur le plan social, économique et politique2.
Importance Culturelle
Les Pygmées jouent un rôle crucial dans la préservation de la biodiversité des forêts
 tropicales et possèdent une connaissance approfondie de leur environnement naturel. 
 Leur musique, leurs danses et leurs traditions orales sont des éléments précieux de la culture camerounaise3</div>
    </div>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel my-4">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/100.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/101.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/102.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>
<section class="order-form py-5">
  <div class="container">
    <div class="row">
      <h2 class="merriweather text-center bg-dark text-light mb-4">Reserver</h2>
      <form action="">
        <div class="row">
          <div class="col md-6 col-sm">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
              <input type="text" 
              class="form-control" 
              placeholder="votre nom" >
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
              <input type="text" 
              class="form-control" 
              placeholder="votre prenom" >
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
              <input type="text" 
              class="form-control" 
              placeholder="votre Nationalité" >
            </div>
          </div>
          <div class="col md-6 col-sm"></div>
          <div class="col md-6 col-sm">
            <div class="input-group mb-3">
             <input type="email" 
              class="form-control" 
              placeholder="votre email" > 
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
              
            </div>
            <div class="input-group mb-3">
             <input type="number" 
              class="form-control" 
              placeholder="votre numero" > 
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
              
            </div>
            <div class="input-group mb-3"> 
              <input type="text" 
              class="form-control" 
              placeholder="votre adresse" >
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
             
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
          <input type="text" 
          class="form-control" 
          placeholder="vos informations splementaire" >
        </div>
        <a href="inscription.php">____________________________________________________________________________________________</a><a href="connexion.php"><button class="btn btn-outline-info rounded-0 merriweather" >Reserver</button>________________________________________________________________________________________</a>
      </form>
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
    <script src="js/bootstrap.bundle.min.js" ></script>

  </body>
</html>