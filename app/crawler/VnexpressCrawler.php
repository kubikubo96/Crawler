<?php

namespace App\Crawler;

class VnexpressCrawler extends Crawler
{
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