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
                            <th>ID</th>
                            <th>Marque</th>
                            <th>Modèle</th>
                            <th>Catégorie</th>
                            <th>Immatriculation</th>
                            <th>Disponibilité</th>
                        </tr>
                    </thead>
                    <tbody>
                    <div class="actions">
                <button class="action-btn" onclick="window.location.href='ajouter.php'">Ajouter</button>
                <button class="action-btn" onclick="window.location.href='modifier.php'">Modifier</button>
                <button class="action-btn" onclick="window.location.href='supprimer.php'">Supprimer</button>
            
    
                        <?php
                        // Connexion à la base de données
                        $servername = "localhost";
                        $username = "root";  
                        $password = "";     
                        $dbname = "public";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connexion échouée: " . $conn->connect_error);
                        }

                        $sql = "SELECT voiture.id_voiture, marque.libelle as Marque ,modele.libelle as Modèle,categorie.libelle as Catégorie, immatriculation
                                FROM voiture, marque, modele, categorie";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id_voiture"] . "</td>";
                                echo "<td>" . $row["Marque"] . "</td>";
                                echo "<td>" . $row["Modèle"] . "</td>";
                                echo "<td>" . $row["Catégorie"] . "</td>";
                                echo "<td>" . $row["immatriculation"] . "</td>";
                                echo "<td>";
                                
                            }
                        } else {
                            echo "<tr><td colspan='6'>Aucune voiture trouvée</td></tr>";
                        }
                        $conn->close();
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
