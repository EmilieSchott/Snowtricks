<?php

namespace App\Controller;

use App\Entity\Figure;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowFigureController extends AbstractController
{
    /**
     * @Route("/figure/{slug}", name="show_figure")
     */
    public function show(Figure $figure, CommentRepository $commentRepository): Response
    {
        return $this->render('show_figure.html.twig', [
            'controller_name' => 'ShowFigureController',
            'figure' => $figure,
            'comments' => $commentRepository->findBy(['figure' => $figure], ['createdAt' => 'DESC']),
        ]);
    }
}
