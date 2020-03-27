<?php

namespace App\Crawler;

Class VietnamnetCrawler extends Crawler
{
    public function getTitleVietNamNet($uri)
    {
        return $this->getSpecificData('/<h1 class="title.*?>(.*?)<\/h1>/m', $uri);
    }

    public function getArticleVietNamNet($uri)
    {
        return $this->getSpecificData('/<div id="ArticleContent"(.*?)<div class="m-t-10 ArticleDateTime clearfix">/ms', $uri);
    }
}