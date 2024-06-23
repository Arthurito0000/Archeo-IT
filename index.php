<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulaire";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Requête SQL pour vérifier les informations de connexion
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Rediriger l'utilisateur vers la page d'administration si les informations sont correctes
        header("Location: ./php/admin_contact.php");
        exit();
    } else {
        // Afficher un message d'erreur si les informations sont incorrectes
        $error_message = "Nom d'utilisateur ou mot de passe incorrect.\n vous pouvez vous connectez en tant que visiteur";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
     
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Connexion</h2>
                <?php if(isset($error_message)) { ?>
                    <div class="alert alert-danger"><?php echo $error_message; ?></div>
                <?php } ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </form>
                <p class="text-center mt-3">Vous pouvez également <a href="accueil.html">continuer en tant que visiteur</a>.</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
