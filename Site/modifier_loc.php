<<<<<<< HEAD
=======
<?php include 'config.php'; ?>
>>>>>>> e551cd32a91bdc09c0f09f1ecfdfbc3af19e9027
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Gestion des Locations - Locoto</title>
=======
    <title>Modifier Locations - Locoto</title>
>>>>>>> e551cd32a91bdc09c0f09f1ecfdfbc3af19e9027
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
<<<<<<< HEAD
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
                
=======
            <form class="rental-form" action="modifier_loc.php" method="post">
                <h1>Modifier les Locations</h1>
                
                <?php
                if (isset($_GET['ids'])) {
                    $location_ids = explode(',', $_GET['ids']);
                    
                    foreach ($location_ids as $location_id) {
                        $sql = "SELECT l.id_louer, v.immatriculation, v.marque, v.modele, l.date_debut, l.date_fin
                                FROM louer l
                                JOIN voitures v ON l.immatriculation = v.immatriculation
                                WHERE l.id_louer='$location_id'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $voiture = $row['immatriculation'];
                            $date_debut = $row['date_debut'];
                            $date_fin = $row['date_fin'];

                            echo "<input type='hidden' name='location_ids[]' value='$location_id'>";
                            
                            echo "<label for='voiture_$location_id'>Voiture :</label>";
                            echo "<select id='voiture_$location_id' name='voitures[]' required>";
                            $sql_voitures = "SELECT immatriculation, marque, modele FROM voitures";
                            $result_voitures = $conn->query($sql_voitures);
                            while ($row_voiture = $result_voitures->fetch_assoc()) {
                                $selected = ($row_voiture['immatriculation'] == $voiture) ? "selected" : "";
                                echo "<option value='{$row_voiture['immatriculation']}' $selected>{$row_voiture['marque']} {$row_voiture['modele']}</option>";
                            }
                            echo "</select>";
                            
                            echo "<label for='date_debut_$location_id'>Date de début :</label>";
                            echo "<input type='date' id='date_debut_$location_id' name='dates_debut[]' value='$date_debut' required>";
                            
                            echo "<label for='date_fin_$location_id'>Date de fin :</label>";
                            echo "<input type='date' id='date_fin_$location_id' name='dates_fin[]' value='$date_fin' required>";
                            echo "<br>";
                        }
                    }
                }
                ?>

>>>>>>> e551cd32a91bdc09c0f09f1ecfdfbc3af19e9027
                <div class="form-actions">
                    <button type="submit" class="action-btn">Enregistrer</button>
                    <button type="reset" class="action-btn cancel-btn" onclick="window.location.href='Locations.php'">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <?php
<<<<<<< HEAD
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
=======
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $location_ids = $_POST['location_ids'];
        $voitures = $_POST['voitures'];
        $dates_debut = $_POST['dates_debut'];
        $dates_fin = $_POST['dates_fin'];

        foreach ($location_ids as $index => $location_id) {
            $voiture = $voitures[$index];
            $date_debut = $dates_debut[$index];
            $date_fin = $dates_fin[$index];

            $sql_update = "UPDATE louer 
                           SET  immatriculation='$voiture', date_debut='$date_debut', date_fin='$date_fin'
                           WHERE id_louer='$location_id'";

            $conn->query($sql_update);
        }

        echo "<script>window.location.href='Locations.php';</script>";
>>>>>>> e551cd32a91bdc09c0f09f1ecfdfbc3af19e9027
    }
    ?>

    <footer>
        <p>&copy; Locoto : Une aventure extraordinaire.</p>
    </footer>
</body>
</html>
