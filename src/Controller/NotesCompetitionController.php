<?php
    // Lire les données du fichier JSON
    $JSONData = json_decode(file_get_contents("../src/notes.json"), true);

    
    function calculer_total($JSONData) {
        $resultats = array();

        foreach ($JSONData as $cavalier) {
            $dossard = $cavalier["dossard"];
            $total = 0;
            foreach ($cavalier["notes"] as $note) {
                if (isset($note["Val"])) $total += array_sum($note["Val"]);
                elseif (isset($note["Pénalité"])) $total -= array_sum($note["Pénalité"]);
            }

            // si on a deja une note pour un dossard on l'ajout au nouveau total
            if (isset($resultats[$dossard])) $resultats[$dossard] += $total;
            else $resultats[$dossard] = $total;
        }

        return $resultats;
    }

    // Calculer le total des notes pour chaque dossard
    $resultatsTotal = calculer_total($JSONData);
    
    // Tableau des notes pour la competition
    echo '<table>';
    echo '<tr><th>Dossard</th><th>Total</th></tr>';
    foreach ($resultatsTotal as $dossard => $total) {
        echo '<tr><td>'.$dossard.'</td><td>'.$total.'</td></tr>';
    }
    echo '</table>';