<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Locations - Locoto</title>
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
            <form class="rental-form" action="supprimer_location.php" method="post">
                <h1>Formulaire de gestion des Locations</h1>
                
                <label for="client_id">ID du Client :</label>
                <input type="text" id="client_id" name="client_id" required>
                
                <div class="form-actions">
                    <button type="submit" class="action-btn delete-btn">Supprimer</button>
                    <button type="reset" class="action-btn cancel-btn" onclick="window.location.href='Locations.php'">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; Locoto : Une aventure extraordinaire.</p>
    </footer>
</body>
</html>
