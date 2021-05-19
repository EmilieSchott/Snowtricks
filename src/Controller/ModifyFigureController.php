<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModifyFigureController extends AbstractController
{
    /**
     * @Route("/modify/figure", name="modify_figure")
     */
    public function index(): Response
    {
        return new Response(
            <<<'EOF'
        <h1>Formulaire de modification d'une figure</h1>
EOF
        );
        /*return $this->render('modify_figure/index.html.twig', [
            'controller_name' => 'ModifyFigureController',
        ]);*/
    }
}
