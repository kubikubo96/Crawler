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
            echo "Lưu thành công !";
        } else {
            echo "Lưu thất bại !";
        }
    }

    public function index()
    {
        if (isset($_POST) && !empty($_POST)) {
            $uri = $_POST['url'];
            $domain = substr($uri, 0, 10);
            $model = new Data();
            if ($domain == "https://vn") {
                $crawler = new VnexpressCrawler();
                $title = $crawler->getTitleVnexpress($uri)[0];
                $article = $crawler->getArticleVnexpress($uri)[0];
                $date = $crawler->getDateVnexpress($uri)[0];
                $status = $model->store($title, $article, $date);
                $this->checkStatus($status);
            } elseif ($domain == "https://da") {
                $crawler = new DantriCrawler();
                $title = $crawler->getTitleDanTri($uri)[0];
                $article = $crawler->getArticleDanTri($uri)[0];
                $date = $crawler->getDateDanTri($uri)[0];
                $status = $model->store($title, $article, $date);
                $this->checkStatus($status);
            } elseif ($domain == "https://vi") {
                $crawler = new VietnamnetCrawler();
                $title = $crawler->getTitleVietNamNet($uri)[0];
                $article = $crawler->getArticleVietNamNet($uri)[0];
                $date = $crawler->getDateVietNamNet($uri)[0];
                $status = $model->store($title, $article, $date);
                $this->checkStatus($status);
            }
        }
        include_once "app/views/index.php";
    }
}