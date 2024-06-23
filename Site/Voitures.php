<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Voitures - Locoto</title>
    <link rel="stylesheet" href="Voitures.css"> 
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">Locoto</div>
            <nav>
                <ul>
                    <li><a href="Page_d'accueil.php">Accueil</a></li>
                    <li><a href="Clients.php">Clients</a></li>
                    <li><a href="Locations.php">Locations</a></li>
                    <li><a href="Connexion.php">Connexion</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Voitures de l'agence</h1> 
             </div>
         </section>

               <section class="table-container">
                 <table>
                    <thead>
                        <tr>
                        <th>Immatriculation</th>
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Catégorie</th>
                        <th>Image de la voiture</th>
                        <th>Disponibilité</th>  
                        </tr>
                    </thead>
                    <tbody>
                    <div class="actions">
                <button class="action-btn" onclick="window.location.href='ajouter_voiture.php'">Ajouter</button>
                <button class="action-btn" onclick="window.location.href='modifier_voiture.php'">Modifier</button>
                <button class="action-btn" onclick="window.location.href='supp_voiture.php'">Supprimer</button>
            
    
                        <?php
                        $sql = "SELECT v.immatriculation, v.marque, v.modele, c.categorie, v.image
                        FROM voitures v
                        JOIN categories c ON v.id_categorie = c.id_categorie";
                $result = $conn->query($sql);
        
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['immatriculation']}</td>
                                <td>{$row['marque']}</td>
                                <td>{$row['modele']}</td>
                                <td>{$row['categorie']}</td>
                                <td><img src='images/{$row['image']}' alt='Image de la voiture' width='100' class='clickable'></td>
                                <td>
                                    <a href='modifier_voiture.php?id={$row['immatriculation']}'>Modifier</a>
                                    <a href='supprimer_voiture.php?id={$row['immatriculation']}'>Supprimer</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Aucune voiture trouvée</td></tr>";
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
