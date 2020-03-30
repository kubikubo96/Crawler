<?php

namespace App\Crawler;

class Crawler
{
    public function getWebContent($uri)
    {
        return file_get_contents($uri);
    }

    public function getSpecificData($regex, $uri)
    {
        preg_match_all($regex, $this->getWebContent($uri), $matches);
        return !empty($matches[1]) ? $matches[1] : FALSE;
    }
}