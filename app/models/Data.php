<?php

namespace App\Models;

use Config;

class Data extends Config
{
    public function getAllData()
    {
        $sqlSelect = "SELECT * FROM data_collected";

        $result = mysqli_query($this->connection, $sqlSelect);

        return $result;
    }

    public function store($title, $article, $datetime)
    {
        if (empty($title) || empty($article) || empty($datetime)) {
            return false;
        }
        $title = addslashes($title);
        $article = addslashes($article);
        $datetime = addslashes($datetime);
        $sqlInsert = "INSERT INTO data_collected (title, article, datetime) VALUES ('$title','$article','$datetime')";

        if (mysqli_query($this->connection, $sqlInsert)) {
            return true;
        }
        return false;
    }
}