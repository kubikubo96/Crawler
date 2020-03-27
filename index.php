<?php

include_once "app/route.php";
include_once "app/controllers/indexController.php";

if (isset($_GET["controller"])) {
    $controller = $_GET["controller"];
} elseif (isset($_POST["controller"])) {
    $controller = $_POST["controller"];
} else {
    $controller = "index";
}

$route = new \App\route();
$route->indexRoute();

//switch ($controller){
//    case "show-data":
//        $route = new \Apps\route();
//        $route->chitietRoute();
//        break;
//    default :
//        $route = new \Apps\route();
//        $route->indexRoute();
//}