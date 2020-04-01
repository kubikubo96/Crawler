<?php

namespace App\Crawler;

Class VietnamnetCrawler extends Crawler
{
    public function getTitle($regex, $uri)
    {
        return parent::getTitle($regex, $uri);
    }

    public function getArticle($regex, $uri)
    {
        return parent::getArticle($regex, $uri);
    }

    public function getDate($regex, $uri)
    {
        return parent::getDate($regex, $uri);
    }
}