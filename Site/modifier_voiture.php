<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Voiture - Locoto</title>
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
            <form class="rental-form" action="modifier_voiture.php" method="post" enctype="multipart/form-data">
                <h1>Formulaire de modification de Voiture</h1>
                
                <label for="immatriculation">Immatriculation (ancienne) :</label>
                <input type="text" id="old_immatriculation" name="old_immatriculation" required>

                <label for="immatriculation">Nouvelle Immatriculation :</label>
                <input type="text" id="immatriculation" name="immatriculation" required>
                
                <label for="marque">Marque :</label>
                <input type="text" id="marque" name="marque" required>
                
                <label for="modele">Modèle :</label>
                <input type="text" id="modele" name="modele" required>
                
                <label for="id_categorie">Catégorie :</label>
                <select id="id_categorie" name="id_categorie" required>
                    <?php
                    $sql = "SELECT * FROM categories";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id_categorie']}'>{$row['categorie']}</option>";
                    }
                    ?>
                </select>
                
                <label for="image">Image :</label>
                <input type="file" id="image" name="image" accept="image/*">
                
                <div class="form-actions">
                    <button type="submit" class="action-btn">Modifier</button>
                    <button type="reset" class="action-btn cancel-btn" onclick="window.location.href='Voitures.php'">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $old_immatriculation = $conn->real_escape_string($_POST['old_immatriculation']);
        $immatriculation = $conn->real_escape_string($_POST['immatriculation']);
        $marque = $conn->real_escape_string($_POST['marque']);
        $modele = $conn->real_escape_string($_POST['modele']);
        $id_categorie = $_POST['id_categorie'];
        $image = $_FILES['image']['name'];
        $target = "images/" . basename($image);

        if (!empty($image) && move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $sql = "UPDATE voitures SET 
                        immatriculation = '$immatriculation', 
                        marque = '$marque', 
                        modele = '$modele', 
                        id_categorie = '$id_categorie', 
                        image = '$image' 
                    WHERE immatriculation = '$old_immatriculation'";
        } else {
            $sql = "UPDATE voitures SET 
                        immatriculation = '$immatriculation', 
                        marque = '$marque', 
                        modele = '$modele', 
                        id_categorie = '$id_categorie' 
                    WHERE immatriculation = '$old_immatriculation'";
        }

        if ($conn->query($sql) === TRUE) {
            echo "<p>Voiture modifiée avec succès</p>";
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
