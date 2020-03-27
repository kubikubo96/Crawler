<?php

include_once "app/route.php";
include_once "app/controllers/indexController.php";
include_once "app/controllers/dataController.php";

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