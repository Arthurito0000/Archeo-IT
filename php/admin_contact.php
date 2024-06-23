<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des demandes de contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <?php echo' <link rel="stylesheet" href="../css/style.css"> '?>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>


<nav class="navbar">

<!-- Marque de la barre de navigation -->
<a href="admin_contact.php" class="navbar-brand">Archéo-IT</a>
<!-- Bouton hamburger pour les écrans de petite taille -->

<div class="hamburger">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"> </span>
</div>

<!-- Menu de navigation -->
<div class="navbar-menu" id="navbarMenu">
<a href="admin_contact.php" class="nav-link" style="color:#007bff">demandes Contact</a>
<a href="admin_inscription.php" class="nav-link">demandes inscription</a>
<a href="../index.php"><i class="fa-solid fa-right-from-bracket nav-link"> </i></a>

</div>



</nav>

<div class="navbars-menu" id="navbarMenu">
<a href="admin_contact.php" class="nav-link" style="color:#007bff">demandes Contact</a>
<a href="admin_inscription.php" class="nav-link "  >demandes inscription</a>
<a href="../index.php"><i class="fa-solid fa-right-from-bracket nav-link" style="cursor:pointer;color :green"> </i></a>
</div>

<div class="container">
    <h1 class="text-center mt-5 mb-4">Liste des demandes de contact</h1>
    
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

    // Récupérer les demandes de contact depuis la base de données
    $sql = "SELECT * FROM demandes_contact";
    $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
        // Afficher les données dans un tableau Bootstrap
        echo "<div class='table-responsive'>";
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>Nom</th><th>Email</th><th>Message</th></tr></thead><tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["nom"]."</td><td>".$row["email"]."</td><td>".$row["message"]."</td>";
            echo "<td><i class='fa-solid fa-trash delete-icon' style='color:green; cursor:pointer;' data-id='".$row["id"]."'></i></td>";
            
            echo"</tr>";
        }
        echo "</tbody></table>";
        echo "</div>";
    // } else {
    //     echo "Aucune demande de contact trouvée.";
    // }

    // Fermer la connexion à la base de données
    $conn->close();
    ?>
</div>

<script>
    $(document).ready(function(){
        $('.delete-icon').click(function(){
            var id = $(this).data('id');
            if(confirm("Êtes-vous sûr de vouloir supprimer cette entrée ?")){
                $.ajax({
                    url: '../php/delete_contact.php',
                    method: 'POST',
                    data: { id: id },
                    success: function(response){
                        // Rafraîchir la page ou mettre à jour le tableau après la suppression
                        location.reload(); // Recharger la page après la suppression
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
    </script>
   <?php echo'<script src="../js/script.js "></script>'?>
</body>
</html>
