<?php

namespace App\Controller;

use App\Entity\Cavalier;
use App\Entity\Competition;
use App\Entity\Epreuve;
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
        $cav = $plans->getCavalier();

        return $this->render('competition/compet.html.twig', array(
            'competition' => $plans,
            'epreuves' => $epr,
            'cavaliers' => $cav
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

    #[Route('/competition/removeEpreuveComp/{id}/{idcomp}', name: 'removeEpreuveComp')]
    public function removeEpreuveComp($id, $idcomp, EntityManagerInterface $em, CompetitionRepository $comp)
    {
        $epr = $em->getRepository(Epreuve::class)->find($id);
        $plans = $comp->find($idcomp);
        if (!$epr) {
            throw $this->createNotFoundException(
                `Aucune Epreuves trouvées` . $id
            );
        }
        $plans->removeEpreuve($epr);
        $em->flush();
        $this->addFlash('success', 'Epreuve supprimée de la compétiton !');
        return new RedirectResponse($this->container->get('router')->generate('compet', ['id' => $idcomp]));
    }

    #[Route('/competition/addEpreuveComp/{idcomp}', name: 'addEpreuveComp')]
    public function addEpreuveComp(Request $request, EntityManagerInterface $em, CompetitionRepository $comp, $idcomp)
    {
        $epreuve = $em->getRepository(Epreuve::class)->find($request->get('epreuve_id'));
        $competition = $comp->find($idcomp);

        if (!$epreuve) {
            $this->addFlash('error', 'Aucune épreuve trouvée avec cet ID');
            return $this->redirectToRoute('compet', ['id' => $idcomp]);
        }

        if (!$competition) {
            $this->addFlash('error', 'Aucune compétition trouvée avec cet ID');
            return $this->redirectToRoute('compet', ['id' => $idcomp]);
        }

        if ($competition->getEpreuves()->contains($epreuve)) {
            $this->addFlash('warning', 'Cette épreuve est déjà liée à la compétition');
            return $this->redirectToRoute('compet', ['id' => $idcomp]);
        }

        $competition->addEpreuve($epreuve);
        $em->flush();

        $this->addFlash('success', 'Épreuve ajoutée à la compétition !');

        return $this->redirectToRoute('compet', ['id' => $idcomp]);
    }


    #[Route('/competition/removeCavalierComp/{id}/{idcomp}', name: 'removeCavalierComp')]
    public function removeCavalierComp($id, $idcomp, EntityManagerInterface $em, CompetitionRepository $comp)
    {
        $epr = $em->getRepository(Cavalier::class)->find($id);
        $plans = $comp->find($idcomp);
        if (!$epr) {
            throw $this->createNotFoundException(
                `Aucun Cavalier trouvées` . $id
            );
        }
        $plans->removeCavalier($epr);
        $em->flush();
        $this->addFlash('success', 'Cavalier supprimée de la compétiton !');
        return new RedirectResponse($this->container->get('router')->generate('compet', ['id' => $idcomp]));
    }

    #[Route('/competition/addCavalierComp/{idcomp}', name: 'addCavalierComp')]
    public function addCavalierComp(Request $request, EntityManagerInterface $em, CompetitionRepository $comp, $idcomp)
    {
        $cavalier = $em->getRepository(Cavalier::class)->find($request->get('cavalier_id'));
        $competition = $comp->find($idcomp);
        if (!$cavalier) {
            $this->addFlash('error', 'Aucun cavalier trouvé avec cet ID');
            return $this->redirectToRoute('compet', ['id' => $idcomp]);
        }

        if (!$competition) {
            $this->addFlash('error', 'Aucune compétition trouvée avec cet ID');
            return $this->redirectToRoute('compet', ['id' => $idcomp]);
        }

        if ($competition->getCavalier()->contains($cavalier)) {
            $this->addFlash('warning', 'Ce cavalier est déjà liée à la compétition');
            return $this->redirectToRoute('compet', ['id' => $idcomp]);
        }

        $competition->addCavalier($cavalier);
        $em->flush();

        $this->addFlash('success', 'Cavalier ajouté à la compétition !');

        return $this->redirectToRoute('compet', ['id' => $idcomp]);
    }
}
