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
            echo "<h4>The URL is not valid!</h4>";
        }
    }

    public function index()
    {
        if (isset($_POST) && !empty($_POST)) {
            $uri = $_POST['url'];
            $domain = substr($uri, 0, 22);
            $model = new Data();
            if ($domain == "https://vnexpress.net/") {
                $crawler = new VnexpressCrawler();
                $title = $crawler->getContent('/<h1 class="title_news_detail.*?">(.*?)<\/h1>/ms', $uri)[0];
                $article = $crawler->getContent('/<article class="content_detail .*?>(.*?)<\/article>/ms', $uri)[0];
                $datetime = $crawler->getContent('/<span class="time.*?>(.*?)<\/span>/m', $uri)[0];
                $status = $model->store($title, $article, $datetime);
                $this->checkStatus($status);
            } elseif ($domain == "https://dantri.com.vn/") {
                $crawler = new DantriCrawler();
                $title = $crawler->getContent('/<h1 class="fon31 mgb15">(.*?)<\/h1>/ms', $uri)[0];
                $article = $crawler->getContent('/<div id="divNewsContent".*?>(.*?)<style>/ms', $uri)[0];
                $datetime = $crawler->getContent('/<span class="fr fon7 mr2 tt-capitalize">(.*?)<\/span>/ms', $uri)[0];
                $status = $model->store($title, $article, $datetime);
                $this->checkStatus($status);
            } elseif ($domain == "https://vietnamnet.vn/") {
                $crawler = new VietnamnetCrawler();
                $title = $crawler->getContent('/<h1 class="title.*?>(.*?)<\/h1>/m', $uri)[0];
                $article = $crawler->getContent('/<div id="ArticleContent" class="ArticleContent">(.*?)><div class="VnnAdsPos clearfix" data-pos="vt_article_bottom">/m', $uri)[0];
                $datetime = $crawler->getContent('/<span class="ArticleDate  right">(.*?)<\/span>/ms', $uri)[0];
                $status = $model->store($title, $article, $datetime);
                $this->checkStatus($status);
            } else {
                echo "Retrieve only data from article details of dantri, vnexpress, vietnamnet<br>URL cannot be empty";
            }
        }
        include_once "app/views/index.php";
    }
}