<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

class  NotesTotalController extends AbstractController
{

    
    function calculer_total($JSONData)
    {
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

    #[Route('/note/competition', name: 'app_note_competition')]
    function index(PersistenceManagerRegistry $doctrine): Response
    {
        // Lire les données du fichier JSON
        $JSONData = json_decode(file_get_contents("../src/notes.json"), true);

        // Calculer le total des notes pour chaque dossard
        $resultatsTotal = $this->calculer_total($JSONData);
        return $this->render('notesTotal.html.twig', [
            'resultats' => $resultatsTotal
        ]);

    }

    
}