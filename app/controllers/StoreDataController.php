<?php

namespace App\Controllers;

use App\Models\Data;
use App\Crawler\VnexpressCrawler;
use App\Crawler\VietnamnetCrawler;
use App\Crawler\DantriCrawler;


class StoreDataController
{
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
                $status = $model->store($title, $article);
                if ($status) {
                    echo "Lưu thành công!";
                } else {
                    echo "Lưu thất bại!";
                }
            } elseif ($domain == "https://da") {
                $crawler = new DantriCrawler();
                echo $crawler->getTitleDanTri($uri)[0];
                echo $crawler->getArticleDanTri($uri)[0];
            } elseif ($domain == "https://vi") {
                $crawler = new VietnamnetCrawler();
                echo $crawler->getTitleVietNamNet($uri)[0];
                echo $crawler->getArticleVietNamNet($uri)[0];
            }
        }
        include_once "app/views/index.php";
    }
}