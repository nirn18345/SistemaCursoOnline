<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MapeoDatosController extends AbstractController
{
    #[Route('/mapeo/datos', name: 'app_mapeo_datos')]
    public function index(): Response
    {
        return $this->render('mapeo_datos/index.html.twig', [
            'controller_name' => 'MapeoDatosController',
        ]);
    }

    
}
