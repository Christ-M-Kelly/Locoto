<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Locoto</title>
    <link rel="stylesheet" href="Connexion.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">Locoto</div>
            <nav>
                <ul>
                    <li><a href="Page_d'accueil.php">Accueil</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <div class="login-container">
        <div class="login-left">
            <h1>Page de Connexion</h1>
            <form action="traitement_connexion.php" method="post">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Mots de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <a href="mot_de_passe_oublie.php" class="forgot-password">Mots de passe oublié ?</a>
                <button type="submit" class="login-btn">Se connecter</button>
            </form>
        </div>
        <div class="login-right">
            <img src="Connexion.png" alt="Locoto Logo">
        </div>
    </div>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Ici, vous ajouteriez la logique pour valider l'utilisateur
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Mot de passe: " . htmlspecialchars($password);
}
?>

    <footer>
        &copy; Locoto : Une aventure extraordinaire.
    </footer>
</body>
</html>
