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
            <form class="rental-form" action="modifier_location.php" method="post">
                <h1>Formulaire de gestion des Locations</h1>
                <!-- Champ pour l'ID de la location à modifier -->
                <input type="hidden" id="location_id" name="location_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">

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
    // Vérifier si des données ont été soumises via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $location_id = $_POST['location_id'];
        $client = $_POST['client'];
        $voiture = $_POST['voiture'];
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];
        $statut = $_POST['statut'];

        // Mettre à jour les données dans la base de données ou afficher les détails mis à jour
        echo "Location mise à jour : <br>";
        echo "ID: $location_id<br>";
        echo "Client: $client<br>";
        echo "Voiture: $voiture<br>";
        echo "Date de début: $date_debut<br>";
        echo "Date de fin: $date_fin<br>";
        echo "Statut: $statut<br>";
    } elseif (isset($_GET['id'])) {
        // Récupérer les détails de la location à partir de la base de données (exemple)
        $location_id = $_GET['id'];

        // Ici, vous devriez récupérer les détails de la location à partir de votre source de données (base de données, etc.)
        // et pré-remplir les champs du formulaire avec ces valeurs
        // Exemple statique pour démonstration
        $client = "Nom du client";
        $voiture = "Modèle de la voiture";
        $date_debut = "2024-06-24";
        $date_fin = "2024-06-28";
        $statut = "En cours";
        
        // Pré-remplissage des champs avec les valeurs récupérées
        echo "<script>";
        echo "document.getElementById('client').value = '$client';";
        echo "document.getElementById('voiture').value = '$voiture';";
        echo "document.getElementById('date_debut').value = '$date_debut';";
        echo "document.getElementById('date_fin').value = '$date_fin';";
        echo "document.getElementById('statut').value = '$statut';";
        echo "</script>";
    }
    ?>

    <footer>
        <p>&copy; Locoto : Une aventure extraordinaire.</p>
    </footer>
</body>
</html>
