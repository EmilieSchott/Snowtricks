<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteFigureController extends AbstractController
{
    /**
     * @Route("/delete/figure", name="delete_figure")
     */
    public function index(): Response
    {
        return new Response(
            <<<'EOF'
        <h1>Suppression d'une figure</h1>
EOF
        );
    }
}
