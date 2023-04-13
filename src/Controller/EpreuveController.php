<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EpreuveRepository;

class EpreuveController extends AbstractController
{
    #[Route('/epreuve', name: 'app_epreuve')]
    public function index(): Response
    {
        return $this->render('epreuve/index.html.twig', [
            'controller_name' => 'EpreuveController',
        ]);
    }

    #[Route('/epreuve/selectEpreuve')]
    public function selectEpreuve(EpreuveRepository $epr): Response
    {
        $plans = $epr->findAll();
        $aff = '';

            foreach ($plans as $plan) {//var_dump($plan);
                $aff .= 
                    'Id : '.$plan->getId() . '<br>'
                    . 'Nom : ' . $plan->getNom() . '<br>'
                    . 'Commentaire : ' . $plan->getCommentaire() . '<br>'
                    . '<br>';
            }

        return new Response(
            '<html><body>
                <p>Epreuves : <br>' . $aff . '</p>
            </body></html>'
        );
    }
}
