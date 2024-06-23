<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Voitures - Locoto</title>
    <link rel="stylesheet" href="Clients.css"> 
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">Locoto</div>
            <nav>
                <ul>
                    <li><a href="Page_d'accueil.php">Accueil</a></li>
                    <li><a href="Voitures.php">Voitures</a></li>
                    <li><a href="Locations.php">Locations</a></li>
                    <li><a href="Connexion.php">Connexion</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Clients de l'agence</h1> 
             </div>
         </section>

               <section class="table-container">
                 <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Adresse</th>
                            <th>Type de Clients</th>
                            <th>Contrat</th>
                        </tr>
                    </thead>
                    <tbody>
                    <div class="actions">
                        <button class="action-btn" onclick="window.location.href='ajouter_location.php'">Ajouter</button>
                        <button class="action-btn" onclick="window.location.href='modifier_loc.php'">Modifier</button>
                        <button class="action-btn" onclick="window.location.href='supp_loc.php'">Supprimer</button>
            
                        <?php
                        $sql = "SELECT * FROM clients";
                        $result = $conn->query($sql);
                 
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                <td>{$row['id_client']}</td>
                <td>{$row['nom']}</td>
                <td>{$row['prenom']}</td>
                <td>{$row['adresse']}</td>
                <td><img src='images/{$row['photo']}' alt='Photo du client' width='100' class='clickable'></td>
                <td>
                <a href='modifier_client.php?id={$row['id_client']}'>Modifier</a>
                <a href='supprimer_client.php?id={$row['id_client']}'>Supprimer</a>
                </td>
                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>Aucun client trouvé</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; Locoto : Une aventure extraordinaire.</p>
    </footer>
</body>
</html>
