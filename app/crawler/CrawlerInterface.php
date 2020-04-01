<?php

namespace App\Crawler;

interface CrawlerInterface
{
    public function getWebContent($uri);

    public function getSpecificData($regex, $uri);
}