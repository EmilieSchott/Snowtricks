<?php

namespace App\Controller;

use App\Entity\Figure;
use App\Form\FigureFormType;
use App\Handler\ImageFormHandler;
use App\Handler\VideoFormHandler;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FigureFormController extends AbstractController
{
    /**
     * @Route("/figure/form", name="create_figure")
     */
    public function createFigure(Request $request, EntityManagerInterface $entityManager, ImageFormHandler $imageFormHandler, VideoFormHandler $videoFormHandler): Response
    {
        $figure = new Figure();
        $form = $this->createForm(FigureFormType::class, $figure);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $imageFormHandler->handleImageForm($form, $figure);
            $videoFormHandler->handleVideoForm($form, $figure);

            $entityManager->persist($figure);
            $entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('figure_form.html.twig', [
            'controller_name' => 'FigureFormController',
            'figure_form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/figure/form/{slug}", name="modify_figure")
     */
    public function modifyFigure(Request $request, Figure $figure, EntityManagerInterface $entityManager, ImageFormHandler $imageFormHandler, VideoFormHandler $videoFormHandler): Response
    {
        $form = $this->createForm(FigureFormType::class, $figure);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $imageFormHandler->handleImageForm($form, $figure);
            $videoFormHandler->handleVideoForm($form, $figure);

            $entityManager->persist($figure);
            $entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('figure_form.html.twig', [
            'controller_name' => 'FigureFormController',
            'figure_form' => $form->createView(),
            'figure' => $figure,
        ]);
    }
}
