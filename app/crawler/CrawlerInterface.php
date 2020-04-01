<?php

namespace App\Crawler;

interface CrawlerInterface
{
    public function getSpecificData($regex, $uri);
}