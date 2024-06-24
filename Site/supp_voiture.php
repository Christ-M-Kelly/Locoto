<?php 
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $immatriculation = $conn->real_escape_string($_POST['immatriculation']);
    
    $sql = "DELETE FROM voitures WHERE immatriculation = '$immatriculation'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: location.php"); // Redirection vers la page location
        exit();
    } else {
        $error = "Erreur: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Voitures - Locoto</title>
    <link rel="stylesheet" href="Ajouter.css"> 
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">Locoto</div>
        </div>
    </header>

    <div class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <form class="rental-form" action="supprimer_voiture.php" method="post">
                <h1>Formulaire de gestion des Voitures</h1>
                
                <label for="immatriculation">Immatriculation :</label>
                <input type="text" id="immatriculation" name="immatriculation" required>
                
                <div class="form-actions">
                    <button type="submit" class="action-btn delete-btn">Supprimer</button>
                    <button type="reset" class="action-btn cancel-btn" onclick="window.location.href='Voitures.php'">Annuler</button>
                </div>
            </form>
            <?php
            if (isset($error)) {
                echo "<p>$error</p>";
            }
            ?>
        </div>
    </div>

    <footer>
        <p>&copy; Locoto : Une aventure extraordinaire.</p>
    </footer>
</body>
</html>
