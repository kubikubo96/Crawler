<?php

namespace App\Crawler;

class DantriCrawler extends Crawler
{
    public function getTitle()
    {
        return $this->getSpecificData('/<h1 class="fon31 mgb15">(.*?)<\/h1>/ms');
    }

    public function getArticle()
    {
        return $this->getSpecificData('/<div id="divNewsContent".*?>(.*?)<style>/ms');
    }

    public function getDate()
    {
        return $this->getSpecificData('/<span class="fr fon7 mr2 tt-capitalize">(.*?)<\/span>/ms');
    }
}