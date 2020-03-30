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
        return $this->getSpecificData('/<div id="ArticleContent" class="ArticleContent">(.*?)><div class="VnnAdsPos clearfix" data-pos="vt_article_bottom">/m', $uri);
    }

    public function getDateVietNamNet($uri)
    {
        return $this->getSpecificData('/<span class="ArticleDate  right">(.*?)<\/span>/ms', $uri);
    }
}