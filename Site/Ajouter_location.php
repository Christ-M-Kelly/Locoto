<?php include 'config.php'; ?>
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
            <form class="rental-form" action="Ajouter_location.php" method="post">
                <h1>Formulaire de gestion des Locations</h1>
                <label for="client">Client :</label>
                <select id="id_client" name="id_client" required>
        <?php
        $sql = "SELECT id_client, nom, prenom FROM clients";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id_client']}'>{$row['nom']} {$row['prenom']}</option>";
        }
        ?>
    </select>

                <label for="voiture">Voiture :</label>
                <select id="immatriculation" name="immatriculation" required>
        <?php
        $sql = "SELECT immatriculation, marque, modele FROM voitures";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['immatriculation']}'>{$row['marque']} {$row['modele']}</option>";
        }
        ?>
    </select>

                <label for="date_debut">Date de début :</label>
                <input type="date" id="date_debut" name="date_debut" required>
                
                <label for="date_fin">Date de Fin :</label>
                <input type="date" id="date_fin" name="date_fin" required>
                
                
                
                <div class="form-actions">
                    <button type="submit" class="action-btn" name="submit">Ajouter</button>
                    <button type="reset" class="action-btn cancel-btn" onclick="window.location.href='Locations.php'">Annuler</button>
                </div>
            </form>
        </div>
    </div>
    <?php
if (isset($_POST['submit'])) {
    $id_client = $_POST['id_client'];
    $immatriculation = $_POST['immatriculation'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];

    $sql = "INSERT INTO louer (id_client, immatriculation, date_debut, date_fin)
            VALUES ('$id_client', '$immatriculation', '$date_debut', '$date_fin')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p>Location ajoutée avec succès</p>";
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
