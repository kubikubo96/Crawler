<?php

namespace App\Controllers;

use App\Models\Data;

class ShowDataController
{
    public function showData()
    {
        $model = new Data();
        $model->getAllData();

        include_once "app/views/show-data.php";
    }
}