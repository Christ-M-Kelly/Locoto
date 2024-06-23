<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer une Voiture - Locoto</title>
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
                <h1>Formulaire de suppression de Voiture</h1>
                
                <label for="immatriculation">Immatriculation :</label>
                <input type="text" id="immatriculation" name="immatriculation" required>
                
                <div class="form-actions">
                    <button type="submit" class="action-btn">Supprimer</button>
                    <button type="reset" class="action-btn cancel-btn" onclick="window.location.href='Voitures.php'">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $immatriculation = $conn->real_escape_string($_POST['immatriculation']);
        
        // Delete the car from the database
        $sql = "DELETE FROM voitures WHERE immatriculation = '$immatriculation'";
        
        if ($conn->query($sql) === TRUE) {
            echo "<p>Voiture supprimée avec succès</p>";
        } else {
            echo "<p>Erreur: " . $conn->error . "</p>";
        }
    }
    ?>

    <footer>
        <p>&copy; Locoto : Une aventure extraordinaire.</p>
    </footer>
</body>
</html>
