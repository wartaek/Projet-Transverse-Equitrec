<?php

namespace App\Controller;

use App\Entity\Epreuve;
use App\Form\EpreuveType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EpreuveRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class EpreuveController extends AbstractController
{
    #[Route('/epreuve', name: 'app_epreuve')]
    public function index(): Response
    {
        return $this->render('epreuve/index.html.twig', [
            'controller_name' => 'EpreuveController',
        ]);
    }

    // #[Route('/epreuve/epreuve/{id}', name: 'epreuve')]
    // public function epreuve(EpreuveRepository $epr, $id): Response
    // {
    //     $plans = $epr->find($id);
    //     $obs = $plans->getParametrers();
    //     //dd($epr);

    //     return $this->render('epreuve/index.html.twig', array(
    //         'epreuve' => $plans, 
    //         'obs' => $obs
    //     ));
    // }

    #[Route('/epreuve/newEpreuve', name: 'newEpreuve')]
    public function newEpreuve(Request $request, EntityManagerInterface $em)
    {
        $epr = new Epreuve();
        $form = $this->createForm(EpreuveType::class, $epr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($epr);
            $em->flush();

            $this->addFlash('success', 'Epreuve correctement enregistrée !');
            return new RedirectResponse($this->container->get('router')->generate('epreuve'));
        }

        return $this->render('epreuve/newEpreuve.html.twig', array(
            'formNewEpr' => $form->createView()
        ));
    }

    #[Route('/epreuve/changerEpreuve/{id}', name: 'changerEpreuve')]
    public function updateEpreuve(Request $request, $id, EntityManagerInterface $em)
    {

        $plans = $em->getRepository(Epreuve::class)->find($id);
        if (!$plans) {
            throw $this->createNotFoundException(
                `Aucune Compétition trouvées` . $id
            );
        }
        $form = $this->createForm(EpreuveType::class, $plans);
        $form->handleRequest($request);        

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Adresse utilisateur mise à jour !');
            return new RedirectResponse($this->container->get('router')->generate('epreuve'));
        }

        return $this->render('epreuve/newEpreuve.html.twig', array(
            'formNewcomp' => $form->createView()
        ));
    }

    #[Route('/epreuve/deleteEpreuve/{id}', name: 'deleteEpreuve')]
    public function deletecomp($id, EntityManagerInterface $em)
    {
        $comp = $em->getRepository(Epreuve::class)->find($id);
        if (!$comp) {
            throw $this->createNotFoundException(
                `Aucune Compétitions trouvées` . $id
            );
        }
        $em->remove($comp);
        $em->flush();
        $this->addFlash('success', 'Compétiton supprimée !');
        return new RedirectResponse($this->container->get('router')->generate('epreuve'));
    }
}
