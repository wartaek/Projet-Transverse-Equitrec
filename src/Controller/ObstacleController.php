<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ObstacleRepository;

class ObstacleController extends AbstractController
{
    #[Route('/obstacle', name: 'app_obstacle')]
    public function index(): Response
    {
        return $this->render('obstacle/index.html.twig', [
            'controller_name' => 'ObstacleController',
        ]);
    }

    #[Route('/obstacle/selectObstacle')]
    public function selectObstacle(ObstacleRepository $obs): Response
    {
        $plans = $obs->findAll();
        $aff = '';

        foreach ($plans as $plan) {
            $params = $plan->getParametrers();
            
            foreach ($params as $param) {//var_dump($param);
                $aff .= 
                    'Id : '.$plan->getId() . '<br>'
                    . 'Nom : ' . $plan->getNom() . '<br>'
                    . 'parametre : <br>' 
                    .'&emsp;Hauteur : '. $param->getHauteur() . '<br>'
                    .'&emsp;Largeur : '. $param->getLargeur() . '<br>'
                    .'&emsp;Temps Max : '. $param->getTempsMax() . '<br>'
                    .'&emsp;Pente : '. $param->getPente() . '<br>'
                    . '<br>';
            }
        }

        return new Response(
            '<html><body>
                <p>Obstacles : <br>' . $aff . '</p>
            </body></html>'
        );
    }
}
