<?php

namespace App\Crawler;

class VnexpressCrawler extends Crawler
{
    public $regexTitle = '/<h1 class="title.*?">(.*?)<\/h1>/m';
    public $regexArticle = '/<div class="sidebar-1".*?description">(.*?)<div class="sidebar-2">/ms';
    public $regexDate = '/<span class="date">(.*?)<\/span>/ms';


}