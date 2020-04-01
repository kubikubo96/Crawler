<?php

namespace App\Crawler;

use App\Curl\Curl;

class Crawler extends Curl implements CrawlerInterface
{
    public function getWebContent($uri)
    {
        return $this->getWebContents($uri);
    }

    public function getSpecificData($regex, $uri)
    {
        preg_match_all($regex, $this->getWebContent($uri), $matches);
        return !empty($matches[1]) ? $matches[1] : FALSE;
    }
}