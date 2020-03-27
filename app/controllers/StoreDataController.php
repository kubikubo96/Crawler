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
            if ($domain == "https://vn") {
                $crawler = new VnexpressCrawler();
                echo $crawler->getTitleVnexpress($uri)[0];
            } elseif ($domain == "https://vi") {
                echo "vietnamnet";
            } elseif ($domain == "https://da") {
                echo "dantri";
            }
        }
        include_once "app/views/index.php";
    }
}