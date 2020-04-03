<?php

namespace App\Crawler;

Class VietnamnetCrawler extends Crawler
{
    public function getTitle()
    {
        return $this->getSpecificData('/<h1 class="title.*?>(.*?)<\/h1>/m');
    }

    public function getArticle()
    {
        return $this->getSpecificData('/<div id="ArticleContent" class="ArticleContent">(.*?)><div class="VnnAdsPos clearfix" data-pos="vt_article_bottom">/m');
    }

    public function getDate()
    {
        return $this->getSpecificData('/<span class="ArticleDate  right">(.*?)<\/span>/ms');
    }
}