<?php

namespace App\Models;

class Data extends Database
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
        $sqlInsert = "INSERT INTO data_collected (title, article, datetime) VALUES ('$title','$article','$datetime')";

        if (mysqli_query($this->connection, $sqlInsert)) {
            return true;
        }
        return false;
    }
}