<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FigureFormController extends AbstractController
{
    /**
     * @Route("/form/figure", name="figure_form")
     */
    public function index(): Response
    {
        return $this->render('figure_form.html.twig', [
            'controller_name' => 'FigureFormController',
        ]);
    }
}