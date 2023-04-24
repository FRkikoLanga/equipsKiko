<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IniciController extends AbstractController
{
    #[Route('/', name: 'inici')]
    public function inici() {
        return new Response ("Gestió d’equips del projecte de 2n de DAW");
        /*
        return $this->render('inici/index.html.twig', [
            'controller_name' => 'IniciController',
        ]);
        */
    }
}
