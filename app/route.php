<?php

namespace App;

use App\Controllers\indexController;

class route
{
    public function indexRoute()
    {
        $controller = new indexController();
        $controller->index();
    }
}