<?php

namespace App;

use App\Controllers\ShowDataController;
use App\Controllers\StoreDataController;

class Route
{
    public function indexRoute()
    {
        $controller = new StoreDataController();
        $controller->index();
    }

    public function dataRoute()
    {
        $controller = new ShowDataController();
        $controller->showData();
    }
}