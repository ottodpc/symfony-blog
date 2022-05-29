<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(): Response
    {
        $res = new Response(status: 200, content: "<h1>Bien reçu !</h1><p>Réponse de la requête</p>");
        dump($res); die;
        return $res;
    }
}
