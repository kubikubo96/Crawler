<?php

namespace App\Crawler;


use App\Abstract_factory\CrawlerInterface;

class DantriCrawler extends Crawler implements CrawlerInterface
{
    public $regexTitle = '/<h1 class=\"fon31 mgb15\">(.*?)<\/h1>/ms';
    public $regexArticle = '/<div id=\"divNewsContent\".*?>(.*?)<style>/ms';
    public $regexDate = '/<span class=\"fr fon7 mr2 tt-capitalize\">(.*?)<\/span>/ms';
}