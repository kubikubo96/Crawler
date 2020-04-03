<?php

namespace App\Crawler;

use App\Curl\Curl;

class Crawler extends Curl implements CrawlerInterface
{
    public $regex;

    public function getSpecificData($regex)
    {
        $this->regex = $regex;

        preg_match_all($this->regex, $this->getWebContent(), $matches);
        return !empty($matches[1]) ? $matches[1] : FALSE;
    }
}