<?php

namespace App\Handler;

use App\Entity\Image;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class PhotoHandler
{
    public function handlePhoto(Image $image, $photoData, string $figurePhotoDir)
    {
        $filename = bin2hex(\ramdom_bytes(6)) . '.' . $photoData->guessExtension();

        try {
            $photoData->move($figurePhotoDir, $filename);
        } catch (FileException $e) {
            // unable to upload photo, give up.
        }
        $image->setName($filename);
    }
}
