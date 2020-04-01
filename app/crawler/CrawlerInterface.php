<?php

namespace App\Crawler;

interface CrawlerInterface
{
    public function getTitle($regex, $uri);

    public function getArticle($regex, $uri);

    public function getDate($regex, $uri);
}