<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FigureFormController extends AbstractController
{
    /**
     * @Route("/figure/form", name="create_figure")
     */
    public function createFigure(): Response
    {
        return $this->render('figure_form.html.twig', [
            'controller_name' => 'FigureFormController',
        ]);
    }

    /**
     * @Route("/figure/form/{slug}", name="modify_figure")
     */
    public function modifyFigure(): Response
    {
        return $this->render('figure_form.html.twig', [
            'controller_name' => 'FigureFormController',
        ]);
    }
}
