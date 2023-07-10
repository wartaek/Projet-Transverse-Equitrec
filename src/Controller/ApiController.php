<?php
// src/Controller/ApiController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
Use App\Entity\Note;
Use App\Entity\Obstacle;
Use App\Entity\Cavalier;
Use App\Entity\Niveau;
Use App\Entity\Style;
Use App\Entity\Contrat;
Use App\Entity\Allure;
Use App\Entity\Penalite;


class ApiController extends AbstractController
{

    #[Route('/api/receive-data', name: 'app_api_data', methods: ['POST'])]
    public function receiveData(Request $request,  EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        if (is_array($data)) {
            // Pour chaque note
            foreach ($data as $noteData) {

                $obstacleId = $noteData['id_obstacle'];
                $cavalierId = $noteData['id_cavalier'];
                $niveauId = $noteData['id_niveau'];
                $styleId = $noteData['id_style'];
                $contratId = $noteData['id_contrat'];
                $allureId = $noteData['id_allure'];
                $penaliteId = $noteData['id_penalite'];

                $obstacle = $em->getRepository(Obstacle::class)->find($obstacleId);
                $cavalier = $em->getRepository(Cavalier::class)->find($cavalierId);
                $niveau = $em->getRepository(Niveau::class)->find($niveauId);
                $style = $em->getRepository(Style::class)->find($styleId);
                $contrat = $em->getRepository(Contrat::class)->find($contratId);
                $allure = $em->getRepository(Allure::class)->find($allureId);
                $penalite = $em->getRepository(Penalite::class)->find($penaliteId);

                $note = new Note();
                $note->setObstacle($obstacle);
                $note->setCavalier($cavalier);
                $note->setNiveau($niveau);
                $note->setStyle($style);
                $note->setContrat($contrat);
                $note->setAllure($allure);
                $note->setPenalite($penalite);

                $em->persist($note);
                $em->flush();
            }

            return new JsonResponse([
                'message' => 'Notes ajoutées avec succès',
            ]);
        }
    }
}
