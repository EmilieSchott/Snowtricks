<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SigninController extends AbstractController
{
    /**
     * @Route("/signin", name="signin")
     */
    public function signin(): Response
    {
        return $this->render('signin.html.twig', [
            'controller_name' => 'SigninController',
        ]);
    }
}
