<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Locations - Locoto</title>
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

                <div class="form-actions">
                    <button type="submit" class="action-btn">Enregistrer</button>
                    <button type="reset" class="action-btn cancel-btn" onclick="window.location.href='Locations.php'">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <?php

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

    }
    ?>

    <footer>
        <p>&copy; Locoto : Une aventure extraordinaire.</p>
    </footer>
</body>
</html>
