<?php

namespace App\Controller;

use App\Entity\Competition;
use App\Form\CompetitonType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CompetitionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

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

        return $this->render('competition/index.html.twig', array(
            'plans' => $plans
        ));
    }

    #[Route('/competition/compet/{id}', name: 'compet')]
    public function compet(CompetitionRepository $comp, $id): Response
    {
        $plans = $comp->find($id);
        $epr = $plans->getEpreuves();
        //dd($epr);

        return $this->render('competition/compet.html.twig', array(
            'competition' => $plans, 
            'epreuves' => $epr
        ));
    }

    #[Route('/competition/newCompet', name: 'newCompet')]
    public function newCompet(Request $request, EntityManagerInterface $em)
    {
        $comp = new Competition();
        $form = $this->createForm(CompetitonType::class, $comp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($comp);
            $em->flush();

            $this->addFlash('success', 'Compétition correctement enregistrée !');
            return new RedirectResponse($this->container->get('router')->generate('competition'));
        }

        return $this->render('competition/newCompet.html.twig', array(
            'formNewcomp' => $form->createView()
        ));
    }

    #[Route('/competition/changerCompet/{id}', name: 'changerCompet')]
    public function updateCompet(Request $request, $id, EntityManagerInterface $em)
    {

        $plans = $em->getRepository(Competition::class)->find($id);
        if (!$plans) {
            throw $this->createNotFoundException(
                `Aucune Compétition trouvées` . $id
            );
        }
        $form = $this->createForm(CompetitonType::class, $plans);
        $form->handleRequest($request);        

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Adresse utilisateur mise à jour !');
            return new RedirectResponse($this->container->get('router')->generate('competition'));
        }

        return $this->render('competition/newCompet.html.twig', array(
            'formNewcomp' => $form->createView()
        ));
    }

    #[Route('/competition/deleteCompet/{id}', name: 'deleteCompet')]
    public function deletecomp($id, EntityManagerInterface $em)
    {
        $comp = $em->getRepository(Competition::class)->find($id);
        if (!$comp) {
            throw $this->createNotFoundException(
                `Aucune Compétitions trouvées` . $id
            );
        }
        $em->remove($comp);
        $em->flush();
        $this->addFlash('success', 'Compétiton supprimée !');
        return new RedirectResponse($this->container->get('router')->generate('competition'));
    }
}
