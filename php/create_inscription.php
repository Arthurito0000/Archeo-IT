<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulaire";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$email = $_POST['email'];
$date_naissance = $_POST['dob'];
$stage = $_POST['stage'];
$commentaires = $_POST['comments'];


// Préparer la requête SQL pour insérer les données
$sql = "INSERT INTO demandes_inscription_stages (id,nom,email, date_naissance, stage, commentaires)
VALUES (' ','$nom', '$email', '$date_naissance', '$stage', '$commentaires')";

// Exécuter la requête SQL
if ($conn->query($sql) === TRUE) {
    echo "Inscription au stage enregistrée avec succès !";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>
