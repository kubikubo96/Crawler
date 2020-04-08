<?php

namespace App\Crawler;
//b1 : create AbstractProduct
interface CrawlerInterface
{
    public function getTitle();

    public function getArticle();

    public function getDate();
}
