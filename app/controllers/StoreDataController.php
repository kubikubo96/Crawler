<?php

namespace App\Controllers;

use App\Models\Model;
use App\Crawler\Crawler_factory\CrawlerFactory;
use Exception;

class StoreDataController
{
    public function index()
    {
        if (isset($_POST) && !empty($_POST)) {
            $uri = $_POST['url'];
            $domain = substr($uri, 0, 22);
            $model = new Model();
            try {
                $this->checkDomain($domain);
                $crawlerFactory = new CrawlerFactory($uri);
                $crawlerWeb = $crawlerFactory->getData($domain);

                $title = $crawlerWeb->getTitle()[0];
                $article = $crawlerWeb->getArticle()[0];
                $datetime = $crawlerWeb->getDate()[0];

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
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        include_once "app/views/index.php";
    }

    public function checkDomain($domain)
    {
        if ($domain == "" || ($domain != "https://vnexpress.net/" && $domain != "https://dantri.com.vn/" && $domain != "https://vietnamnet.vn/")) {
            throw new Exception("<h4>Retrieve only data from article details of dantri, vnexpress, vietnamnet<br>URL cannot be empty</h4>");
        }
        return true;
    }

    public function checkNull($title, $article, $datetime)
    {
        if ($title == NULL && $article == NULL && $datetime == NULL) {
            throw new Exception("<h4>The URL is not valid!</h4>");
        }
        return true;
    }

    public function checkStatus($status)
    {
        if (!$status) {
            throw new Exception("<h4>Data saving failed!</h4>");
        }
        echo "<h4>Data crawled successfully!</h4>";
        return true;
    }
}