<?php

namespace App\Handler;

use Symfony\Component\HttpFoundation\File\Exception\FileException;

class PhotoHandler
{
    private $figurePhotoDir;

    public function __construct(string $figurePhotoDir)
    {
        $this->figurePhotoDir = $figurePhotoDir;
    }

    public function handlePhoto(object $photoFile): string
    {
        $filename = bin2hex(\openssl_random_pseudo_bytes(6)) . '.' . $photoFile->guessExtension();

        try {
            $photoFile->move($this->figurePhotoDir, $filename);
        } catch (FileException $e) {
        }

        return $filename;
    }
}
