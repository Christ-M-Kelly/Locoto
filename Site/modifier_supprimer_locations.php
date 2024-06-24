<?php include 'config.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_locations = $_POST['selected_locations'];
    $action = $_POST['action'];

    if (!empty($selected_locations)) {
        if ($action == 'modifier') {
            
            $location_ids = implode(',', $selected_locations);
            echo "<script>window.location.href='modifier_loc.php?ids=$location_ids';</script>";
        } elseif ($action == 'supprimer') {
            
            foreach ($selected_locations as $location_id) {
                $sql_delete = "DELETE FROM louer WHERE id_louer='$location_id'";
                $conn->query($sql_delete);
            }
            echo "<script>window.location.href='Locations.php';</script>";
        }
    } else {
        echo "<p>Aucune location sélectionnée.</p>";
    }
}
?>
