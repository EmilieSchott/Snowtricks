<?php

namespace App\Handler;

use App\Entity\Figure;

class ImageFormHandler
{
    private $photoHandler;

    public function __construct(PhotoHandler $photoHandler)
    {
        $this->photoHandler = $photoHandler;
    }

    public function handleImageForm(object $form, Figure &$figure)
    {
        $imageLoop = 0;
        foreach ($form['images'] as $formImage) {
            $photoFile = $formImage->get('photo')->getData();
            $figureImages = $figure->getImages();
            if ($photoFile) {
                $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
                $figureImages[$imageLoop]->setAlt($originalFilename);
                $imageName = $this->photoHandler->handlePhoto($photoFile);
                $figureImages[$imageLoop]->setName($imageName);
            }
            if (!$photoFile && !$figureImages[$imageLoop]->getAlt()) {
                $figure->removeImage($figureImages[$imageLoop]);
            }
            ++$imageLoop;
        }
    }
}
