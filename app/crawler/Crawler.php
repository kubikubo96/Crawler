<?php

namespace App\Crawler;

use App\Curl\Curl;

class Crawler extends Curl implements CrawlerInterface
{
    public function getSpecificData($regex)
    {
        preg_match_all($regex, $this->getWebContent(), $matches);
        return !empty($matches[1]) ? $matches[1] : FALSE;
    }
}