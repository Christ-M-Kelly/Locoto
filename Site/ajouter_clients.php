<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des clients - Locoto</title>
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
            <form class="rental-form" action="ajouter_client.php" method="post" enctype="multipart/form-data">
                <h1>Formulaire de gestion des clients</h1>
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" required>
                
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" required>
                
                <label for="adresse">Adresse:</label>
                <input type="text" id="adresse" name="adresse" required>
                
                <label for="id_type_client">Type de Client:</label>
                <select id="id_type_client" name="id_type_client" required>
                    <?php
                    include 'config.php';
                    $sql = "SELECT * FROM typesclient";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id_type_client']}'>{$row['type_client']}</option>";
                    }
                    ?>
                </select>
                
                <label for="photo">Photo:</label>
                <input type="file" id="photo" name="photo" accept="image/*" required>
                
                <div class="form-actions">
                    <button type="submit" name="submit" class="action-btn">Enregistrer</button>
                    <button type="reset" class="action-btn cancel-btn" onclick="window.location.href='Locations.php'">Annuler</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $nom = $conn->real_escape_string($_POST['nom']);
        $prenom = $conn->real_escape_string($_POST['prenom']);
        $adresse = $conn->real_escape_string($_POST['adresse']);
        $id_type_client = $_POST['id_type_client'];
        $photo = $_FILES['photo']['name'];
        $target = "images/" . basename($photo);

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
            $sql = "INSERT INTO clients (nom, prenom, adresse, id_type_client, photo)
                    VALUES ('$nom', '$prenom', '$adresse', '$id_type_client', '$photo')";
            
            if ($conn->query($sql) === TRUE) {
                echo "<p>Client ajouté avec succès</p>";
            } else {
                echo "<p>Erreur: " . $conn->error . "</p>";
            }
        } else {
            echo "<p>Erreur lors du téléchargement de la photo.</p>";
        }
    }
    ?>

    <footer>
        <p>&copy; Locoto : Une aventure extraordinaire.</p>
    </footer>
</body>
</html>
