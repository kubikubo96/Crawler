<?php

namespace App\Crawler;


class DantriCrawler extends Crawler
{
    public $regexTitle = '/<h1 class=\"fon31 mgb15\">(.*?)<\/h1>/ms';
    public $regexArticle = '/<div id=\"divNewsContent\".*?>(.*?)<style>/m';
    public $regexDate = '/<span class=\"fr fon7 mr2 tt-capitalize\">(.*?)<\/span>/ms';

    public function getTitle()
    {
        return $this->getSpecificData();
    }

    public function getArticle()
    {
        return $this->getSpecificData();
    }

    public function getDate()
    {
        return $this->getSpecificData();
    }
}