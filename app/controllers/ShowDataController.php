<?php

namespace App\Controllers;

use App\Models\Model;

class ShowDataController
{
    public function showData()
    {
        $model = new Model();
        $result = $model->getAllData();

        include_once "app/views/show-data.php";
    }
}