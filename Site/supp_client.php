<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un Client - Locoto</title>
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
            <form class="rental-form" action="supprimer_client.php" method="post">
                <h1>Formulaire de suppression de client</h1>
                
                <label for="id_client">ID du Client à supprimer :</label>
                <input type="text" id="id_client" name="id_client" required>
                
                <div class="form-actions">
                    <button type="submit" name="submit" class="action-btn">Supprimer</button>
                    <button type="reset" class="action-btn cancel-btn" onclick="window.location.href='Clients.php'">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $id_client = $conn->real_escape_string($_POST['id_client']);

        // Delete the client from the database
        $sql = "DELETE FROM clients WHERE id_client = '$id_client'";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Client supprimé avec succès</p>";
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
