<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CompetitionRepository;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;

class CompetitionController extends AbstractController
{
    #[Route('/competition', name: 'app_competition')]
    public function index(): Response
    {
        return $this->render('competition/index.html.twig', [
            'controller_name' => 'CompetitionController',
        ]);
    }

    #[Route('/competition/selectCompetition', name: 'competition')]
    public function selectCompetition(CompetitionRepository $comp): Response
    {
        $plans = $comp->findAll();
        $tab = [];
        $aff = "";

        foreach ($plans as $plan) { //var_dump($plan);
            $aff .=
                '<tr>
                    <td>'. $plan->getNom() .'</td>
                    <td>' . $plan->getDate()->format('Y-m-d') . '</td>
                    <td>' . $plan->getVille() . '</td>
                    <td>' . $plan->getCp() . '</td>
                </tr>';
            $tab2 = [
                'Nom' => $plan->getNom(),
                'Date' => $plan->getDate()->format('Y-m-d'),
                'Ville' => $plan->getVille(),
                'Cp' => $plan->getCp()
            ];

            $tab = ['tab' => $tab2];
        }

        return $this->render('competition/index.html.twig', $tab);
        // return new Response(
        //     '<html><body>
        //         <p>Compétitions : <br></p>
        //         <table>
        //             <tr>
        //                 <td>Nom</td>
        //                 <td>Date</td>
        //                 <td>Ville</td>
        //                 <td>Code Postal</td>
        //             </tr>
        //             '.$aff.'
        //         </table
        //     </body></html>'
        // );
    }
}
