<?php

namespace App\Crawler;

use App\Curl\Curl;

class Crawler implements CrawlerInterface
{
    public $uri;
    public $regexTitle;
    public $regexArticle;
    public $regexDate;

    public function __construct($uri)
    {
        $this->uri = $uri;
    }

    public function getTitle()
    {
        return $this->getSpecificData($this->regexTitle, $this->uri);
    }

    public function getArticle()
    {
        return $this->getSpecificData($this->regexArticle, $this->uri);
    }

    public function getDate()
    {
        return $this->getSpecificData($this->regexDate, $this->uri);
    }

    public function getSpecificData($regex, $uri)
    {
        $curl = new Curl($uri);

        preg_match_all($regex, $curl->getWebContent(), $matches);
        return !empty($matches[1]) ? $matches[1] : FALSE;
    }
}