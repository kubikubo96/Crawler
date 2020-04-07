<?php

namespace App\Controllers;

use App\Models\Model;
use App\Abstract_factory\VnexpressFactory;
use App\Abstract_factory\DantriFactory;
use App\Abstract_factory\VietnamnetFactory;
use Exception;

class StoreDataController
{
    public function index()
    {
        if (isset($_POST) && !empty($_POST)) {
            $uri = $_POST['url'];
            $domain = substr($uri, 0, 22);
            $model = new Model();
            if ($domain == "https://vnexpress.net/") {
                $crawlerVnexpress = new VnexpressFactory($uri);
                $title = $crawlerVnexpress->makeGetData()->getTitle()[0];
                $article = $crawlerVnexpress->makeGetData()->getArticle()[0];
                $datetime = $crawlerVnexpress->makeGetData()->getDate()[0];
            } elseif ($domain == "https://dantri.com.vn/") {
                $crawlerDantri = new DantriFactory($uri);
                $title = $crawlerDantri->makeGetData()->getTitle()[0];
                $article = $crawlerDantri->makeGetData()->getArticle()[0];
                $datetime = $crawlerDantri->makeGetData()->getDate()[0];
            } elseif ($domain == "https://vietnamnet.vn/") {
                $crawlerVietnamnet = new VietnamnetFactory($uri);
                $title = $crawlerVietnamnet->makeGetData()->getTitle()[0];
                $article = $crawlerVietnamnet->makeGetData()->getArticle()[0];
                $datetime = $crawlerVietnamnet->makeGetData()->getDate()[0];
            } else {
                echo "<h4>Retrieve only data from article details of dantri, vnexpress, vietnamnet<br>URL cannot be empty</h4>";
                include_once "app/views/index.php";
                return false;
            }
            try {
                $this->checkNull($title, $article, $datetime);
                $status = $model->store($title, $article, $datetime);
                try {
                    $this->checkStatus($status);
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        include_once "app/views/index.php";
    }

    public function checkStatus($status)
    {
        if (!$status) {
            throw new Exception("<h4>Data saving failed!</h4>");
        }
        echo "<h4>Data crawled successfully!</h4>";
        return true;
    }

    public function checkNull($title, $article, $datetime)
    {
        if ($title == NULL && $article == NULL && $datetime == NULL) {
            throw new Exception("<h4>The URL is not valid!</h4>");
        }
        return true;
    }

}