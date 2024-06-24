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
                        <button class="action-btn" onclick="window.location.href='ajouter_client.php'">ajouter</button>
                        <button class="action-btn" onclick="window.location.href='modifier_client.php'">Modifier</button>
                        <button class="action-btn" onclick="window.location.href='supp_client.php'">Supprimer</button>
            
                        <?php
                        $sql = "SELECT c.id_client, c.nom, c.prenom, c.adresse, t.type_client
                        FROM clients c
                        JOIN typesclient t ON c.id_type_client = t.id_type_client";
                        $result = $conn->query($sql);
                 
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                <td>{$row['id_client']}</td>
                <td>{$row['nom']}</td>
                <td>{$row['prenom']}</td>
                <td>{$row['adresse']}</td>
                <td>{$row['type_client']}</td>
                <td>
                
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
