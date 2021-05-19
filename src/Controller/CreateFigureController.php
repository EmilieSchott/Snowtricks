<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateFigureController extends AbstractController
{
    /**
     * @Route("/create/figure", name="create_figure")
     */
    public function index(): Response
    {
        return new Response(
            <<<'EOF'
        <h1>Formulaire de création d'une figure</h1>
EOF
        );
        /*return $this->render('create_figure/index.html.twig', [
            'controller_name' => 'CreateFigureController',
        ]);*/
    }
}
