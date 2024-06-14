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
                    <li><a href="Voitures.php">Locations</a></li>
                    <li><a href="Connexion.php">Connexion</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Gestion des locations</h1> 
             </div>
         </section>

               <section class="table-container">
                 <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom du client</th>
                            <th>Immatriculation de la voiture</th>
                            <th>Date de début</th>
                            <th>Date de Fin</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                    <div class="actions">
                <button class="action-btn" onclick="window.location.href='Ajouter_location.php'">Ajouter</button>
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

                        $sql = "SELECT id_location, nom, immatriculation, date_debut, date_fin
                                FROM voiture, client, location ";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id_location"] . "</td>";
                                echo "<td>" . $row["nom"] . "</td>";
                                echo "<td>" . $row["immatriculation"] . "</td>";
                                echo "<td>" . $row["date_debut"] . "</td>";
                                echo "<td>" . $row["date_fin"] . "</td>";
                                echo "<td>";
                                
                            }
                        } else {
                            echo "<tr><td colspan='6'>Aucune location trouvée</td></tr>";
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
