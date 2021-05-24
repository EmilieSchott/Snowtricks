<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowFigureController extends AbstractController
{
    /**
     * @Route("/show/figure", name="show_figure")
     */
    public function index(): Response
    {
        return $this->render('show_figure.html.twig', [
            'controller_name' => 'ShowFigureController',
        ]);
    }
}
