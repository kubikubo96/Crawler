<?php

namespace App\Controllers;

use App\Models\Data;
use App\Crawler\VnexpressCrawler;
use App\Crawler\VietnamnetCrawler;
use App\Crawler\DantriCrawler;


class storeDataController
{
    public function index()
    {
        if (isset($_POST) && !empty($_POST)) {
            $uri = $_POST['url'];
            $domain = substr($uri, 0, 10);
            if ($domain == "https://vn") {
                echo "vnexpress";
            } elseif ($domain == "https://vi") {
                echo "vietnamnet";
            } elseif ($domain == "https://da") {
                echo "dantri";
            }
        }
        include_once "app/views/index.php";
    }
}