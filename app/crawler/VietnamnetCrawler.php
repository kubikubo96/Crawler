<?php

namespace App\Crawler;

Class VietnamnetCrawler extends Crawler
{
    public function getContent($regex, $uri)
    {
        return $this->getSpecificData($regex, $uri);
    }
}