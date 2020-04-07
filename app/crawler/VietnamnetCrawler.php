<?php

namespace App\Crawler;

Class VietnamnetCrawler extends Crawler
{
    public $regexTitle = '/<h1 class="title.*?>(.*?)<\/h1>/m';
    public $regexArticle = '/<div id="ArticleContent" class="ArticleContent">(.*?)><div class="VnnAdsPos clearfix" data-pos="vt_article_bottom">/m';
    public $regexDate = '/<span class="ArticleDate  right">(.*?)<\/span>/ms';
}