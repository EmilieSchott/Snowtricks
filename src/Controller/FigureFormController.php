<?php

namespace App\Controller;

use App\Entity\Figure;
use App\Form\FigureFormType;
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
        $figure = new Figure();
        $form = $this->createForm(FigureFormType::class, $figure);

        return $this->render('figure_form.html.twig', [
            'controller_name' => 'FigureFormController',
            'figure_form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/figure/form/{slug}", name="modify_figure")
     */
    public function modifyFigure(Figure $figure): Response
    {
        $form = $this->createForm(FigureFormType::class, $figure);

        return $this->render('figure_form.html.twig', [
            'controller_name' => 'FigureFormController',
            'figure_form' => $form->createView(),
        ]);
    }
}
