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
                $title = $crawler->getTitleVnexpress($uri)[0];
                $article = $crawler->getArticleVnexpress($uri)[0];
                $datetime = $crawler->getDateVnexpress($uri)[0];
                $status = $model->store($title, $article, $datetime);
                $this->checkStatus($status);
            } elseif ($domain == "https://da") {
                $crawler = new DantriCrawler();
                $title = $crawler->getTitleDanTri($uri)[0];
                $article = $crawler->getArticleDanTri($uri)[0];
                $datetime = $crawler->getDateDanTri($uri)[0];
                $status = $model->store($title, $article, $datetime);
                $this->checkStatus($status);
            } elseif ($domain == "https://vi") {
                $crawler = new VietnamnetCrawler();
                $title = $crawler->getTitleVietNamNet($uri)[0];
                $article = $crawler->getArticleVietNamNet($uri)[0];
                $datetime = $crawler->getDateVietNamNet($uri)[0];
                $status = $model->store($title, $article, $datetime);
                $this->checkStatus($status);
            } else {
                echo "Retrieve only data from article details of dantri, vnexpress, vietnamnet<br>URL cannot be empty";
            }
        }
        include_once "app/views/index.php";
    }
}