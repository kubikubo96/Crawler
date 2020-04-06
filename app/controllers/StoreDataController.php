<?php

namespace App\Controllers;

use App\Models\Model;
use App\Crawler\VnexpressCrawler;
use App\Crawler\VietnamnetCrawler;
use App\Crawler\DantriCrawler;


class StoreDataController
{
    public function index()
    {
        if (isset($_POST) && !empty($_POST)) {
            $uri = $_POST['url'];
            $domain = substr($uri, 0, 22);
            $model = new Model();
            if ($domain == "https://vnexpress.net/") {
                $crawler = new VnexpressCrawler($uri);
                $title = $crawler->getTitle()[0];
                $article = $crawler->getArticle()[0];
                $datetime = $crawler->getDate()[0];
                if ($this->checkNull($title, $article, $datetime)) {
                    $status = $model->store($title, $article, $datetime);
                    $this->checkStatus($status);
                }
            } elseif ($domain == "https://dantri.com.vn/") {
                $crawler = new DantriCrawler($uri);
                $title = $crawler->getTitle()[0];
                $article = $crawler->getArticle()[0];
                $datetime = $crawler->getDate()[0];
//                $this->checkNull($title, $article, $datetime);
                $status = $model->store($title, $article, $datetime);
                $this->checkStatus($status);
            } elseif ($domain == "https://vietnamnet.vn/") {
                $crawler = new VietnamnetCrawler($uri);
                $title = $crawler->getTitle()[0];
                $article = $crawler->getArticle()[0];
                $datetime = $crawler->getDate()[0];
//                $this->checkNull($title, $article, $datetime);
                $status = $model->store($title, $article, $datetime);
                $this->checkStatus($status);
            } else {
                echo "<h4>Retrieve only data from article details of dantri, vnexpress, vietnamnet<br>URL cannot be empty</h4>";
            }
        }
        include_once "app/views/index.php";
    }

    public function checkStatus($status)
    {
        if ($status) {
            echo "<h4>Data crawled successfully!</h4>";
        } else {
            echo "<h4>Data saving failed!</h4>";
        }
    }

    public function checkNull($title, $article, $datetime)
    {
        if ($title == NULL && $article == NULL && $datetime == NULL) {
            echo "<h4>The URL is not valid!</h4>";
            return false;
        }
        return true;
    }
}