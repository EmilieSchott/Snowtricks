<?php

namespace App\Handler;

use App\Entity\Figure;

class VideoFormHandler
{
    public function handleVideoForm(object $form, Figure &$figure)
    {
        $videoLoop = 0;
        foreach ($form['videos'] as $formVideo) {
            $videoUrl = $formVideo->get('url')->getData();
            $figureVideos = $figure->getVideos();
            if ($videoUrl) {
                $figureVideos[$videoLoop]->setUrl($videoUrl);
            }
            ++$videoLoop;
        }
    }
}
