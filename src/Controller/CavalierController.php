<?php

namespace App\Controller;

use App\Entity\Cavalier;
use App\Entity\Niveau;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;


class CavalierController extends AbstractController
{
    #[Route('/cavalier', name: 'cavalier')]
    public function index(): Response
    {
        return $this->render('cavalier/index.html.twig', [
            'controller_name' => 'CavalierController',
            'message' => '',
            'color' => ''
        ]);
    }

    #[Route('/newCavalier', name: 'new_cavalier')]
    public function traitementCavalier(Request $request, PersistenceManagerRegistry $doctrine): Response
    { 
        dump($request);
        
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

            // return new Response('Cavalier enregistré !');
            return $this->render('cavalier/index.html.twig', [
                'controller_name' => 'CavalierController',
                'message' => 'Cavalier enregistré !',
                'color' => 'green'
            ]);
        }        
        else 
        {
            // return new Response('Erreur lors de l\'enregistrement.');
            return $this->render('cavalier/index.html.twig', [
                'controller_name' => 'CavalierController',
                'message' => 'Erreur lors de l\'enregistrement.',
                'color' => 'red'
            ]);
        }
        

    }
}
