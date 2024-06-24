<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Liste des Voitures - Locoto</title>
    <link rel="stylesheet" href="Clients.css"> 
=======
    <title>Gestion des Locations - Locoto</title>
    <link rel="stylesheet" href="Location.css"> 
>>>>>>> e551cd32a91bdc09c0f09f1ecfdfbc3af19e9027
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">Locoto</div>
            <nav>
                <ul>
                    <li><a href="Page_d'accueil.php">Accueil</a></li>
                    <li><a href="Voitures.php">Voitures</a></li>
<<<<<<< HEAD
                    <li><a href="Locations.php">Locations</a></li>
=======
                    <li><a href="Clients.php">Clients</a></li>
>>>>>>> e551cd32a91bdc09c0f09f1ecfdfbc3af19e9027
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
            <div class="actions">
            <button class="action-btn" onclick="window.location.href='Ajouter_location.php'">Ajouter</button>
                <button class="action-btn" onclick="toggleCheckboxes('modifier')">Modifier</button>
                <button class="action-btn" onclick="toggleCheckboxes('supprimer')">Supprimer</button>
            </div>
            <form id="locationsForm" action="modifier_supprimer_locations.php" method="post">
                <input type="hidden" name="action" id="formAction">
                <table>
                    <thead>
                        <tr>
<<<<<<< HEAD
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
=======
                            <th></th> 
                            <th>ID</th>
                            <th>Nom du client</th>
                            <th>Voiture</th>
                            <th>Date de début</th>
                            <th>Date de Fin</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT l.id_louer, c.nom, c.prenom, v.marque, v.modele, l.date_debut, l.date_fin
                                FROM louer l
                                JOIN clients c ON l.id_client = c.id_client
                                JOIN voitures v ON l.immatriculation = v.immatriculation";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $date_debut = new DateTime($row['date_debut']);
                                $date_fin = new DateTime($row['date_fin']);
                                $maintenant = new DateTime();
                        
                                if ($maintenant > $date_fin) {
                                    // Location terminée
                                    $statut = 'Terminée';
                                } elseif ($maintenant < $date_debut) {
                                    // Location à venir
                                    $statut = 'À venir';
                                } else {
                                    // Location en cours
                                    $statut = 'En cours';
                                }
                                
                                echo "<tr>
                                        <td><input type='checkbox' name='selected_locations[]' value='{$row['id_louer']}' class='checkbox'></td>
                                        <td>{$row['id_louer']}</td>
                                        <td>{$row['nom']} {$row['prenom']}</td>
                                        <td>{$row['marque']} {$row['modele']}</td>
                                        <td>{$row['date_debut']}</td>
                                        <td>{$row['date_fin']}</td>
                                        <td>$statut</td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>Aucune location trouvée</td></tr>";
>>>>>>> e551cd32a91bdc09c0f09f1ecfdfbc3af19e9027
                        }
                        ?>
                    </tbody>
                </table>
<<<<<<< HEAD
            </div>
=======
                <div class="form-actions" id="formActions" style="display: none;">
                    <button type="submit" class="action-btn">Confirmer</button>
                    <button type="button" class="action-btn cancel-btn" onclick="toggleCheckboxes()">Annuler</button>
                </div>
            </form>
>>>>>>> e551cd32a91bdc09c0f09f1ecfdfbc3af19e9027
        </section>
    </main>

    <footer>
        <p>&copy; Locoto :une  aventure extraordinaire.</p>
    </footer>

    <script>
        function toggleCheckboxes(action = '') {
            const checkboxes = document.querySelectorAll('.checkbox');
            const formActions = document.getElementById('formActions');
            const formAction = document.getElementById('formAction');

            checkboxes.forEach(cb => {
                cb.style.display = action ? 'block' : 'none';
                cb.checked = false;
            });

            formActions.style.display = action ? 'block' : 'none';
            formAction.value = action;
        }
    </script>
</body>
</html>
