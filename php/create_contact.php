<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$database = "formulaire";

$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$email = $_POST['email'];
$message = $_POST['message'];

// Requête SQL pour insérer les données dans la table de contact
$sql = "INSERT INTO demandes_contact (id,nom, email, message) VALUES (' ','$nom', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Les informations de contact ont été enregistrées avec succès.";
} else {
    echo "Erreur lors de l'/enregistrement des informations de contact : " . $conn->error;
}

// Fermer la connexion à la base de données

$conn->close();
?>
