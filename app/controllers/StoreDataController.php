<?php

namespace App\Controllers;

use App\Models\Data;
use App\Crawler\VnexpressCrawler;
use App\Crawler\VietnamnetCrawler;
use App\Crawler\DantriCrawler;


class StoreDataController
{
    public function checkStatus($status)
    {
        if ($status) {
            echo "<h4>Data crawled successfully!</h4>";
        } else {
            echo "<h4>Data saving failed!</h4>";
        }
    }

    public function index()
    {
        if (isset($_POST) && !empty($_POST)) {
            $uri = $_POST['url'];
            $domain = substr($uri, 0, 10);
            $model = new Data();
            if ($uri == 'https://vietnamnet.vn/' || $uri == 'https://vnexpress.net/' || $uri == 'https://vnexpress.net/') {
                echo "<h4>The URL is not valid!</h4>";
            } elseif ($domain == "https://vn") {
                $crawler = new VnexpressCrawler();
                $title = $crawler->getTitle('/<h1 class="title_news_detail.*?">(.*?)<\/h1>/ms', $uri)[0];
                $article = $crawler->getArticle('/<article class="content_detail .*?>(.*?)<\/article>/ms', $uri)[0];
                $datetime = $crawler->getDate('/<span class="time.*?>(.*?)<\/span>/m', $uri)[0];
                echo $title,$datetime,$article;
                $status = $model->store($title, $article, $datetime);
                $this->checkStatus($status);
            } elseif ($domain == "https://da") {
                $crawler = new DantriCrawler();
                $title = $crawler->getTitle('/<h1 class="fon31 mgb15">(.*?)<\/h1>/ms', $uri)[0];
                $article = $crawler->getArticle('/<div id="divNewsContent".*?>(.*?)<style>/ms', $uri)[0];
                $datetime = $crawler->getDate('/<span class="fr fon7 mr2 tt-capitalize">(.*?)<\/span>/ms', $uri)[0];
                $status = $model->store($title, $article, $datetime);
                $this->checkStatus($status);
            } elseif ($domain == "https://vi") {
                $crawler = new VietnamnetCrawler();
                $title = $crawler->getTitle('/<h1 class="title.*?>(.*?)<\/h1>/m', $uri)[0];
                $article = $crawler->getArticle('/<div id="ArticleContent" class="ArticleContent">(.*?)><div class="VnnAdsPos clearfix" data-pos="vt_article_bottom">/m', $uri)[0];
                $datetime = $crawler->getDate('/<span class="ArticleDate  right">(.*?)<\/span>/ms', $uri)[0];
                $status = $model->store($title, $article, $datetime);
                $this->checkStatus($status);
            } else {
                echo "Retrieve only data from article details of dantri, vnexpress, vietnamnet<br>URL cannot be empty";
            }
        }
        include_once "app/views/index.php";
    }
}