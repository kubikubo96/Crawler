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

    public function store($title, $article, $date)
    {
        if (empty($title) || empty($article) || empty($date)) {
            return false;
        }
        $sqlInsert = "INSERT INTO data_collected (title, article, date) VALUES ('$title','$article','$date')";

        if (mysqli_query($this->connection, $sqlInsert)) {
            return true;
        }
        return false;
    }
}