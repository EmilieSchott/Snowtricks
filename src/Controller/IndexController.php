<?php

namespace App\Controller;

use App\Repository\FigureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(FigureRepository $figureRepository): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'IndexController',
            'figures' => $figureRepository->findAll(),
        ]);
    }
}
