<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Controller\FindAll;
use App\Repository\NoteRepository;
use App\Entity\Note;
use App\Entity\Obstacle;

class NotesController extends AbstractController
{
    #[Route('/obstacles', name: 'app_obstacles')]
    public function showAllObstacle(EntityManagerInterface $em): Response
    {
        $obstacles = $em->getRepository(Obstacle::class)->findAll();

        return $this->render('notes/index.html.twig', array(
            'obstacles' => $obstacles
        ));
            
    }

    #[Route('/notes/{id}', name: 'app_notes_by_obstacle')]
    public function showAllNotesByObstacleId(EntityManagerInterface $em, int $id): Response
    {
        $notes = $em->getRepository(Note::class)->findByObstacle($id);

        return $this->render('notes/notes.html.twig', array(
            'notes' => $notes
        ));
            
    }



}
