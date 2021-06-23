<?php

namespace App\Controller;

use App\Entity\Figure;
use App\Form\FigureFormType;
use App\Handler\ImageFormHandler;
use App\Handler\PhotoHandler;
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
    public function modifyFigure(Request $request, Figure $figure, EntityManagerInterface $entityManager, PhotoHandler $photoHandler, string $figurePhotoDir): Response
    {
        $form = $this->createForm(FigureFormType::class, $figure);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //On a 3 images avec juste 1 champs photo
            //    dump($form['images']);
            $imageLoop = 0;
            foreach ($form['images'] as $formImage) {
                //        dump($formImage);
                $photoFile = $formImage->get('photo')->getData();
                //    dump($photoFile);
                $figureImages = $figure->getImages();
                if ($photoFile) {
                    //    dd($photoFile);
                    //aucune des 3 photos n'arrivent l
                    $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
                    $figureImages[$imageLoop]->setAlt($originalFilename);
                    $imageName = $photoHandler->handlePhoto($photoFile, $figurePhotoDir);
                    $figureImages[$imageLoop]->setName($imageName);
                }
                if (!$photoFile && !$figureImages[$imageLoop]->getAlt()) {
                    $figure->removeImage($figureImages[$imageLoop]);
                }
                ++$imageLoop;
            }

            $videoLoop = 0;
            foreach ($form['videos'] as $formVideo) {
                //        dump($formVideo);
                $videoUrl = $formVideo->get('url')->getData();
                //    dump($videoUrl);
                $figureVideos = $figure->getVideos();
                if ($videoUrl) {
                    //    dd($videoUrl);
                    //aucune des 3 photos n'arrivent là

                    $figureVideos[$videoLoop]->setUrl($videoUrl);
                }
                if (!$videoUrl && !$figureVideos[$videoLoop]->getUrl()) {
                    $figure->removeVideo($figureVideos[$videoLoop]);
                }
                ++$videoLoop;
            }

            // dd($form['images']);
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
