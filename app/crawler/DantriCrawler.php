<?php

namespace App\Crawler;

class DantriCrawler extends Crawler
{
    public function getContent($regex, $uri)
    {
        return $this->getSpecificData($regex, $uri);
    }
}