<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

class  NotesObstaclesController extends AbstractController
{
    // Calculer le total des notes par cavalier
    function calculer_total_Obstacle($JSONData) {
       
        $totals = array();
        foreach ($JSONData as $notes) {
            $dossard = $notes['dossard'];
            $total = 0;
            foreach ($notes['notes'] as $note) {
                if (isset($note['Val'])) {
                    $total += $note['Val'][0];
                }
            }
            $totals[$dossard] = $total;
        }  
        return $totals;
    }
    

    #[Route('/note/obstacles', name: 'app_note_obstacles')]
    function index(PersistenceManagerRegistry $doctrine): Response
    {
        // Lire les données du fichier JSON
        $JSONData = json_decode(file_get_contents("../src/notes.json"), true);

        // Calculer le total des notes pour chaque dossard
        $resultatsTotal = $this->calculer_total_Obstacle($JSONData);
        return $this->render('notesObstacle.html.twig', [
            'data' => $JSONData,
            'totals' => $resultatsTotal
        ]);

    }

}

