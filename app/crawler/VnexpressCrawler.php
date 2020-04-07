<?php

namespace App\Crawler;

class VnexpressCrawler extends Crawler
{
    public $regexTitle = '/<h1 class="title_news_detail.*?">(.*?)<\/h1>/ms';
    public $regexArticle = '/<article class="content_detail .*?>(.*?)<\/article>/ms';
    public $regexDate = '/<span class="time.*?>(.*?)<\/span>/m';
    public function getTitle()
    {
        return $this->getSpecificData('/<h1 class="title_news_detail.*?">(.*?)<\/h1>/ms');
    }

    public function getArticle()
    {
        return $this->getSpecificData('/<article class="content_detail .*?>(.*?)<\/article>/ms');
    }

    public function getDate()
    {
        return $this->getSpecificData('/<span class="time.*?>(.*?)<\/span>/m');
    }
}