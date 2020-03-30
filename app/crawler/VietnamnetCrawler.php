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
        return $this->getSpecificData('/<div id="ArticleContent" class="ArticleContent">(.*?)><div id="BoxTag"/m   ', $uri);
    }
}