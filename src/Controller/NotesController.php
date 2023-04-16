<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Repository\NoteTotalRepository;
use App\Repository\CavalierRepository;
use App\Repository\ObstacleRepository;
use App\Repository\PenaliteRepository;
use App\Repository\TypeNoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class NotesController extends AbstractController
{
    #[Route('/note/total', name: 'app_note_total')]
    public function allnotes(NoteTotalRepository $notesTotal) : Response{

        $notesTotal->findAll();
        dd($notesTotal->findAll());

        return $this->render('notesTotale.html.twig', [
            'notesTotal' => $notesTotal,
        ]);
    }


    public function index(): Response
    {
        // Lire les données du fichier JSON
        //$JSONData = json_decode(file_get_contents("../src/notes.json"), true);

        // Calculer le total des notes pour chaque dossard
        //$resultatsTotal = $this->calculerTotal($JSONData);

        // Tableau des notes pour la competition
        $tableauHtml = '<table>';
        $tableauHtml .= '<tr><th>Dossard</th><th>Total</th></tr>';
        foreach ($resultatsTotal as $dossard => $total) {
            $tableauHtml .= '<tr><td>'.$dossard.'</td><td>'.$total.'</td></tr>';
        }
        $tableauHtml .= '</table>';

        return $this->render('notes/index.html.twig', [
            'tableauHtml' => $tableauHtml,
        ]);
    }


    private function calculerTotal(array $JSONData): array
    {
        $resultats = array();

        foreach ($JSONData as $cavalier) {
            $dossard = $cavalier["dossard"];
            $total = 0;
            foreach ($cavalier["notes"] as $note) {
                if (isset($note["Val"])) {
                    $total += array_sum($note["Val"]);
                } elseif (isset($note["Pénalité"])) {
                    $total -= array_sum($note["Pénalité"]);
                }
            }

            // si on a deja une note pour un dossard on l'ajout au nouveau total
            if (isset($resultats[$dossard])) {
                $resultats[$dossard] += $total;
            } else {
                $resultats[$dossard] = $total;
            }
        }

        return $resultats;
    }
}