<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Figure;
use App\Form\CommentFormType;
use App\Repository\CommentRepository;
use App\Repository\ImageRepository;
use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowFigureController extends AbstractController
{
    /**
     * @Route("/figure/{slug}", name="show_figure")
     */
    public function show(Figure $figure, ImageRepository $imageRepository, VideoRepository $videoRepository, CommentRepository $commentRepository): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentFormType::class, $comment);

        return $this->render('show_figure.html.twig', [
                    'controller_name' => 'ShowFigureController',
                    'figure' => $figure,
                    'comments' => $commentRepository->findBy(['figure' => $figure], ['createdAt' => 'DESC']),
                    'comment_form' => $form->createView(),
                ]);
    }
}
