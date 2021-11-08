<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PastriesController extends AbstractController
{
    /**
     * @Route("/pastries", name="pastries")
     */
    public function index(): Response
    {
        return $this->render('pastries/index.html.twig', [
            'controller_name' => 'PastriesController',
        ]);
    }
}
