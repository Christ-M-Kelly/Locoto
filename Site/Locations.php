<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Locations - Locoto</title>
    <link rel="stylesheet" href="Location.css"> 

</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">Locoto</div>
            <nav>
                <ul>
                    <li><a href="Page_d'accueil.php">Accueil</a></li>
                    <li><a href="Voitures.php">Voitures</a></li>
                    <li><a href="Clients.php">Clients</a></li>
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

                        }
                        ?>
                    </tbody>
                </table>


                <div class="form-actions" id="formActions" style="display: none;">
                    <button type="submit" class="action-btn">Confirmer</button>
                    <button type="button" class="action-btn cancel-btn" onclick="toggleCheckboxes()">Annuler</button>
                </div>
            </form>

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
