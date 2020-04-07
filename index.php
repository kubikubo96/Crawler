<?php

include_once "app/config/config.php";
include_once "app/Route.php";
include_once "app/controllers/StoreDataController.php";
include_once "app/controllers/ShowDataController.php";
include_once "app/models/Model.php";
include_once "app/crawler/CrawlerInterface.php"; //CrawlerInterface must be included before Crawler
include_once "app/curl/Curl.php";
include_once "app/crawler/Crawler.php";
include_once "app/crawler/DantriCrawler.php";
include_once "app/crawler/VietnamnetCrawler.php";
include_once "app/crawler/VnexpressCrawler.php";

if (isset($_GET["controller"])) {
    $controller = $_GET["controller"];
} elseif (isset($_POST["controller"])) {
    $controller = $_POST["controller"];
} else {
    $controller = "index";
}

switch ($controller) {
    case "show-data":
        $route = new \App\Route();
        $route->dataRoute();
        break;
    default :
        $route = new \App\Route();
        $route->indexRoute();
}