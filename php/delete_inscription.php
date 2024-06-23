<?php
// Vérifier si la requête est une requête POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si l'identifiant est présent dans la requête POST
    if (isset($_POST['id'])) {
        // Récupérer l'identifiant de l'enregistrement à supprimer depuis la requête POST
        $id = $_POST['id'];

        // Connexion à la base de données (à remplacer par vos informations de connexion)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "formulaire";

        // Création de la connexion
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué : " . $conn->connect_error);
        }

        // Préparer la requête SQL de suppression
        $sql = "DELETE FROM demandes_inscription_stages WHERE id = $id";

        // Exécuter la requête de suppression
        if ($conn->query($sql) === TRUE) {
            // Succès : retourner un message de succès
            echo "L'enregistrement a été supprimé avec succès.";
        } else {
            // Erreur : retourner un message d'erreur
            echo "Une erreur s'est produite lors de la suppression de l'enregistrement : " . $conn->error;
        }

        // Fermer la connexion à la base de données
        $conn->close();
    } else {
        // Si l'identifiant n'est pas présent dans la requête POST, retourner un message d'erreur
        echo "L'identifiant de l'enregistrement à supprimer n'a pas été fourni.";
    }
} else {
    // Si la requête n'est pas une requête POST, retourner un message d'erreur
    echo "Cette page ne peut être accédée que par une requête POST.";
}
?>
