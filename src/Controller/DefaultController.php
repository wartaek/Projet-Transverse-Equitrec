<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Serializer\SerializerInterface;

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

    /**
     * @Route("/listJuge", name="listJuge")
     */
    public function listJuge(EntityManagerInterface $em, KernelInterface $kernel): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return new RedirectResponse($this->generateUrl('app_login'));
        }

        $juges = $em->getRepository(User::class)->findAll();

        return $this->render('listJuge.html.twig', ['juges' => $juges]);
    }

    /**
     * @Route("/qwerCodeJuge/{id}", name="qwerCodeJuge")
     */
    public function qwerCodeJuge(EntityManagerInterface $em, KernelInterface $kernel, SerializerInterface $serializer,$id): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return new RedirectResponse($this->generateUrl('app_login'));
        }

        $juges = $em->getRepository(User::class)->getCompetitionsWithCavaliersAndObstacles($id);

        if (empty($juges)) {
            $dataUri = 'Aucune compétition disponible pour ce juge.';
        } else {

            // // Convertir les informations des juges en JSON
            // $datas = array();
            // foreach ($juges as $key => $juge) {
            //     $datas[$key]['name'] = $juge->getName();
            //     $datas[$key]['competition']['id'] = $juge->getCompetition()->getId();
            //     $datas[$key]['competition']['nom'] = $juge->getCompetition()->getNom();
            //     $datas[$key]['competition']['ville'] = $juge->getCompetition()->getVille();
            //     $datas[$key]['competition']['cp'] = $juge->getCompetition()->getCp();
            //     $datas[$key]['competition']['adresse'] = $juge->getCompetition()->getAdresse();
            //     $cavaliers = $juge->getCompetition()->getCavalier();
            //     foreach ($cavaliers as $cavalier) {
            //         $cavalierData = [
            //             'id' => $cavalier->getId(),
            //             'nom' => $cavalier->getNom(),
            //             'prenom' => $cavalier->getPrenom(),
            //             'license' => $cavalier->getLicense(),
            //             'dossard' => $cavalier->getDossard()
            //         ];

            //         $datas[$key]['competition']['cavaliers'][] = $cavalierData;
            //     }

            //     // $datas[$key]['competition'] = $juge->getCompetition()->getCavalier()->getNoteTotal();
            //     // $datas[$key]['competition'] = $juge->getCompetition()->getCavalier()->getNiveaux();
            // }

            // $jsonContent = new JsonResponse($datas);

            $jsonContent = $serializer->serialize($juges, 'json', ['groups' => 'json', 'json_encode_options' => JSON_UNESCAPED_UNICODE]);

            // Générer le code QR avec le contenu JSON
            $qrCode = Builder::create()
                ->writer(new PngWriter())
                ->data($jsonContent)
                ->encoding(new Encoding('UTF-8'))
                ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
                ->size(600)
                ->margin(10)
                ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
                ->build();

            // Enregistrer le code QR dans un fichier
            $qrCodePath = $kernel->getProjectDir() . '/public/img/qrcode.png';
            $qrCode->saveToFile($qrCodePath);

            // Générer un URI de données pour inclure les données de l'image en ligne (dans une balise <img>)
            $dataUri = $qrCode->getDataUri();
        }

        return $this->render('qwercode.html.twig', ['qrCodeDataUri' => $dataUri]);
    }
}
