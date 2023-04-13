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

    #[Route('/epreuve/selectEpreuve', name:'epreuve')]
    public function selectEpreuve(EpreuveRepository $epr ): Response
    {
        $plans = $epr->findAll();

        return $this->render('epreuve/index.html.twig', array(
            'plans' => $plans
        ));
    }
}
