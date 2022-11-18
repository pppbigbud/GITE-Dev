<?php

namespace App\Controller;

use App\Entity\Booking;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api', name: 'app_api')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    #[Route('/api/{id}/edit', name: 'app_api_event_edit', methods: 'PUT')]
    public function majEvent(?Booking $booking, ManagerRegistry $doctrine, Request $request): Response
    {

        //On récupère les données
        $donnees = json_decode($request->getContent());


//        if (
//            isset($donnees->title) && !empty($donnees->title) &&
//            isset($donnees->description) && !empty($donnees->description) &&
//            isset($donnees->start) && !empty($donnees->start)&&
//            isset($donnees->end) && !empty($donnees->end)&&
//            isset($donnees->isallday) && !empty($donnees->isallday)
//        )

        if (
            $donnees->title != "" &&
            $donnees->description != "" &&
            $donnees->start != "" &&
            $donnees->end != "" &&
            $donnees->allDay != ""
        ) {
            //les données sont complètes
            //on initialise un code

            $code = 200;

            // on vérifie si l'id existe

            if (!$booking) {
                //on instancie un rendez-vous
                $calendar = new Booking();

                //on change le code
                $code = 201;
            }
            //On hydrate l'objet avec nos données
            $calendar->setTitle($donnees->title);
            $calendar->setDescription($donnees->description);
            $calendar->setStart(new DateTime($donnees->start));
            if ($donnees->allDay) {
                $calendar->setEnd(new DateTime($donnees->start));
            } else {
                $calendar->setEnd(new DateTime($donnees->end));
            }
            $calendar->setAllDay($donnees->allDay);
//            $calendar->setBackgroundColor($donnees->backgroundColor);

            $entityManager = $doctrine->getManager();
            $entityManager->persist($calendar);
            $entityManager->flush();

            //on retourne un code

            return new Response('OK', $code);

        } else {
            //les données sont incomplètes
            return new Response('Données incomplètes sa mère', 404);
        }

//        return $this->render('api/index.html.twig', [
//            'test' => $booking,
//        ]);
    }

}
