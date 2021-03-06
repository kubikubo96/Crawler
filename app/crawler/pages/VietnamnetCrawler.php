<?php

namespace App\Crawler;
//b2 : implements interface
Class VietnamnetCrawler extends Crawler implements CrawlerInterface
{
    public $regexTitle = '/<h1 class="title.*?>(.*?)<\/h1>/m';
    public $regexArticle = '/<div id="ArticleContent" class="ArticleContent">(.*?)><div class="VnnAdsPos clearfix" data-pos="vt_article_bottom">/m';
    public $regexDate = '/<span class="ArticleDate  right">(.*?)<\/span>/ms';
}