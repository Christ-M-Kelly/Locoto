<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Client - Locoto</title>
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
            <form class="rental-form" action="modifier_client.php" method="post" enctype="multipart/form-data">
                <h1>Formulaire de modification des clients</h1>
                
                <label for="id_client">ID du Client (à modifier) :</label>
                <input type="text" id="id_client" name="id_client" required>
                
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
                
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
                
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" required>
                
                <label for="id_type_client">Type de Client :</label>
                <select id="id_type_client" name="id_type_client" required>
                    <?php
                    $sql = "SELECT * FROM typesclient";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id_type_client']}'>{$row['type_client']}</option>";
                    }
                    ?>
                </select>
                
                <label for="photo">Photo :</label>
                <input type="file" id="photo" name="photo" accept="image/*">
                
                <div class="form-actions">
                    <button type="submit" name="submit" class="action-btn">Modifier</button>
                    <button type="reset" class="action-btn cancel-btn" onclick="window.location.href='Clients.php'">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $id_client = $conn->real_escape_string($_POST['id_client']);
        $nom = $conn->real_escape_string($_POST['nom']);
        $prenom = $conn->real_escape_string($_POST['prenom']);
        $adresse = $conn->real_escape_string($_POST['adresse']);
        $id_type_client = $_POST['id_type_client'];
        $photo = $_FILES['photo']['name'];
        $target = "images/" . basename($photo);

        if (!empty($photo) && move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
            $sql = "UPDATE clients SET 
                        nom = '$nom', 
                        prenom = '$prenom', 
                        adresse = '$adresse', 
                        id_type_client = '$id_type_client', 
                        photo = '$photo' 
                    WHERE id_client = '$id_client'";
        } else {
            $sql = "UPDATE clients SET 
                        nom = '$nom', 
                        prenom = '$prenom', 
                        adresse = '$adresse', 
                        id_type_client = '$id_type_client' 
                    WHERE id_client = '$id_client'";
        }

        if ($conn->query($sql) === TRUE) {
            echo "<p>Client modifié avec succès</p>";
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
