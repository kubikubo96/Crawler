<?php

include_once "app/route.php";
include_once "app/models/Database.php";
include_once "app/controllers/StoreDataController.php";
include_once "app/controllers/ShowDataController.php";
include_once "app/models/Data.php";
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
        $route = new \App\route();
        $route->dataRoute();
        break;
    default :
        $route = new \App\route();
        $route->indexRoute();
}