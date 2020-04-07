<?php

namespace App\Crawler;

class VnexpressCrawler extends Crawler
{
    public $regexTitle = '/<h1 class="title_news_detail.*?">(.*?)<\/h1>/ms';
    public $regexArticle = '/<article class="content_detail .*?>(.*?)<\/article>/ms';
    public $regexDate = '/<span class="time.*?>(.*?)<\/span>/m';


}