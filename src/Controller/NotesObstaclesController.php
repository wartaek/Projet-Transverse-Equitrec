<?php

error_reporting(E_ERROR | E_PARSE);  // j'ai un warning sur l'affichage des Libelle_Type_Note mais l'affichage se fait correctement

// Recupere le contenue du JSON
$JSONData = json_decode(file_get_contents("../src/notes.json"), true);

// Calculer le total des notes par cavalier
function calculer_total($notes) {
    $total = 0;
    foreach ($notes as $note) {
        if(isset($note['Val'])) $total += array_sum($note['Val']);
        if(isset($note['Pénalité'])) $total -= array_sum($note['Pénalité']);
    }
    return $total;
}


// Tableau de notes
echo '<table>';
    echo '<tr><th>Dossard</th><th>Numéro d\'obstacle</th><th>Contrat</th><th>Style</th><th>Allures</th><th>Pénalité</th><th>Total</th></tr>';
        foreach ($JSONData as $cavalier) {
            echo '<tr>';
            echo '<td>' . $cavalier['dossard'] . '</td>';
            echo '<td>' . $cavalier['IdObstacle'] . '</td>';
            $contrat = 0;
            $style = 0;
            $allures = 0;
            $penalite = 0;
            foreach ($cavalier['notes'] as $note) {
                if($note['Libelle_Type_Note'] == 'Contrat') $contrat = array_sum($note['Val']);
                elseif($note['Libelle_Type_Note'] == 'Style') $style = array_sum($note['Val']);
                elseif($note['Libelle_Type_Note'] == 'Allures')$allures = array_sum($note['Val']);
                elseif(isset($note['Pénalité'])) $penalite = array_sum($note['Pénalité']);
            }
            $total = calculer_total($cavalier['notes']);
            echo '<td>' . $contrat . '</td>';
            echo '<td>' . $style . '</td>';
            echo '<td>' . $allures . '</td>';
            echo '<td>' . $penalite . '</td>';
            echo '<td class="total">' . $total . '</td>';
            echo '</tr>';
        }
echo '</table>';
