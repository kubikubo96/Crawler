<?php

namespace App;

use App\Controllers\dataController;
use App\Controllers\indexController;

class route
{
    public function indexRoute()
    {
        $controller = new indexController();
        $controller->index();
    }

    public function dataRoute()
    {
        $controller = new dataController();
        $controller->showData();
    }
}