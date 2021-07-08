<?php

namespace App\Controller;

use App\Entity\Figure;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FigureDeleteController extends AbstractController
{
    /**
     * @Route("/figure/delete/{slug}", name="delete_figure")
     */
    public function delete(Figure $figure): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($figure);
        $entityManager->flush();

        return $this->redirectToRoute('homepage');
    }
}
