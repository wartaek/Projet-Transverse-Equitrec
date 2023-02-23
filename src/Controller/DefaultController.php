<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function accueil()
    {
        return $this->render('equitrec.html.twig');
    }

    /**
     * @Route("/monCompte", name="compte")
     */
    public function compte(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return new RedirectResponse($this->generateUrl('app_login'));
        }
    
        return $this->render('compte.html.twig', ['user' => $user]);
    }
    
    
}