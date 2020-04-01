<?php

namespace App\Crawler;

class VnexpressCrawler extends Crawler
{
    public function getContent($regex, $uri)
    {
        return $this->getSpecificData($regex, $uri);
    }
}