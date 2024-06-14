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
            <form class="rental-form" action="submit_rental.php" method="post">
                <h1>Formulaire de gestion des Locations</h1>
                <label for="client">Client :</label>
                <input type="text" id="client" name="client" required>
                
                <label for="voiture">Voiture :</label>
                <input type="text" id="voiture" name="voiture" required>
                
                <label for="date_debut">Date de début :</label>
                <input type="date" id="date_debut" name="date_debut" required>
                
                <label for="date_fin">Date de Fin :</label>
                <input type="date" id="date_fin" name="date_fin" required>
                
                <label for="statut">Statut de location :</label>
                <input type="text" id="statut" name="statut" required>
                
                <div class="form-actions">
                    <button type="submit" class="action-btn">Enregistrer</button>
                    <button type="reset" class="action-btn cancel-btn" onclick="window.location.href='Locations.php'">Annuler</button>
                </div>
            </form>
        </div>
    </div>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $client = $_POST['client'];
    $voiture = $_POST['voiture'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $statut = $_POST['statut'];

    // Simuler une insertion dans la base de données
    echo "Location enregistrée : <br>";
    echo "Client: $client<br>";
    echo "Voiture: $voiture<br>";
    echo "Date de début: $date_debut<br>";
    echo "Date de fin: $date_fin<br>";
    echo "Statut: $statut<br>";
}
?>

    <footer>
        <p>&copy; Locoto : Une aventure extraordinaire.</p>
    </footer>
</body>
</html>
