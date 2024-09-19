<?php
// Fonction pour se connecter à la base de données
function db_connect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gestion_tourisme";

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    return $conn;
}

// Fonction pour fermer la connexion à la base de données
function db_close($conn) {
    $conn->close();
}

// Fonction pour vérifier si un utilisateur est connecté
function is_logged_in() {
    return isset($_SESSION['client_id']);
}

// Fonction pour rediriger vers la page de connexion si l'utilisateur n'est pas connecté
function require_login() {
    if (!is_logged_in()) {
        header("Location: connexion.php");
        exit();
    }
}

// Fonction pour vérifier si un administrateur est connecté
function is_admin_logged_in() {
    return isset($_SESSION['admin_id']);
}

// Fonction pour rediriger vers la page de connexion admin si l'administrateur n'est pas connecté
function require_admin_login() {
    if (!is_admin_logged_in()) {
        header("Location: admin_login.php");
        exit();
    }
}
?>
