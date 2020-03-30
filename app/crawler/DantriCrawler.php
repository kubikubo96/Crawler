<?php

namespace App\Crawler;

class DantriCrawler extends Crawler
{
    public function getTitleDanTri($uri)
    {
        return $this->getSpecificData('/<h1 class="fon31 mgb15">(.*?)<\/h1>/ms', $uri);
    }

    public function getArticleDanTri($uri)
    {
        return $this->getSpecificData('/<div id="divNewsContent".*?>(.*?)<style>/ms', $uri);
    }

    public function getDateDanTri($uri)
    {
        return $this->getSpecificData('/<span class="fr fon7 mr2 tt-capitalize">(.*?)<\/span>/ms', $uri);
    }
}