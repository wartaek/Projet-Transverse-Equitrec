<?php

namespace App\Controller;

use App\Entity\Cavalier;
use App\Entity\Niveau;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

class CavalierController extends AbstractController
{
    #[Route('/cavalier', name: 'cavalier')]
    public function index(PersistenceManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $cavaliers = $entityManager->getRepository(Cavalier::class)->findAll();

        return $this->render('cavalier/index.html.twig', [
            'controller_name' => 'CavalierController',
            'cavaliers' => $cavaliers,
        ]);
    }

    #[Route('/newCavalier', name: 'new_cavalier')]
    public function traitementCavalier(Request $request, PersistenceManagerRegistry $doctrine): Response
    {        
        $manager = $doctrine->getManager();

        if ($request->request->count() > 0)
        {
            $nom = $request->request->get('nom');
            $prenom = $request->request->get('prenom');
            $licence = $request->request->get('licence');
            $dossard = $request->request->get('dossard');
            $niveau = $request->request->get('niveau');          
    
            $ObjCavalier = new Cavalier(); 
            $ObjCavalier->setNom($nom); 
            $ObjCavalier->setPrenom($prenom); 
            $ObjCavalier->setLicense($licence); 
            $ObjCavalier->setDossard($dossard); 
            
            $manager->persist($ObjCavalier);
            $manager->flush();
           
            $ObjNiveau = new Niveau();
            $ObjNiveau->setNom($niveau);
            $ObjCavalier->addNiveau($ObjNiveau);

            $manager->persist($ObjNiveau);
            $manager->flush();

            $message = "Cavalier enregistré !";
            echo "<script type='text/javascript'>alert('$message');</script>";

            return $this->index($doctrine);
        }        
        else 
        {
            $message = "Erreur lors de l'enregistrement.";
            echo "<script type='text/javascript'>alert('$message');</script>";

            return $this->index($doctrine);
        }
    }

   
}
