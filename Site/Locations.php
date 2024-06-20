<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Voitures - Locoto</title>
    <link rel="stylesheet" href="Location.css"> 
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">Locoto</div>
            <nav>
                <ul>
                    <li><a href="Page_d'accueil.php">Accueil</a></li>
                    <li><a href="Clients.php">Clients</a></li>
                    <li><a href="Voitures.php">Voitures</a></li>
                    <li><a href="Connexion.php">Connexion</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Gestion des Locations</h1> 
             </div>
         </section>

               <section class="table-container">
                 <table>
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Nom du client</th>
                        <th>Voiture</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                    <div class="actions">
                <button class="action-btn" onclick="window.location.href='Ajouter.php'">Ajouter</button>
                <button class="action-btn" onclick="window.location.href='modifier.php'">Modifier</button>
                <button class="action-btn" onclick="window.location.href='supprimer.php'">Supprimer</button>
            
    
        <?php
        $sql = "SELECT l.id_louer, c.nom, c.prenom, v.marque, v.modele, l.date_debut, l.date_fin
                FROM louer l
                JOIN clients c ON l.id_client = c.id_client
                JOIN voitures v ON l.immatriculation = v.immatriculation";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_louer']}</td>
                        <td>{$row['nom']} {$row['prenom']}</td>
                        <td>{$row['marque']} {$row['modele']}</td>
                        <td>{$row['date_debut']}</td>
                        <td>{$row['date_fin']}</td>
                        <td>
                            <a href='modifier_location.php?id={$row['id_louer']}'>Modifier</a>
                            <a href='supprimer_location.php?id={$row['id_louer']}'>Supprimer</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Aucune location trouvée</td></tr>";
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

