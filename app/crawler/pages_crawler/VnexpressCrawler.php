<?php

namespace App\Crawler;
//b2 : implements interface
class VnexpressCrawler extends Crawler implements CrawlerInterface
{
    public $regexTitle = '/<h1 class="title.*?">(.*?)<\/h1>/m';
    public $regexArticle = '/<div class="sidebar-1".*?description">(.*?)<div class="sidebar-2">/ms';
    public $regexDate = '/<span class="date">(.*?)<\/span>/ms';
}