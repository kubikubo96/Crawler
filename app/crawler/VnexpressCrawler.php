<?php

namespace App\Crawler;

class VnexpressCrawler extends Crawler
{
    public function getTitleVnexpress($uri)
    {
        return $this->getSpecificData('/<h1 class="title_news_detail.*?">(.*?)<\/h1>/ms', $uri);
    }

    public function getArticleVnexpress($uri)
    {
        return $this->getSpecificData('/<article class="content_detail .*?>(.*?)<\/article>/ms', $uri);
    }

    public function getDateVnexpress($uri)
    {
        return $this->getSpecificData('/<span class="time.*?>(.*?)<\/span>/m', $uri);
    }
}