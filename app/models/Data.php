<?php

namespace App\Models;

class Data extends database
{
    public function getAllData()
    {
        $sqlSelect = "SELECT * FROM data_collected";

        $result = mysqli_query($this->connection, $sqlSelect);

        return $result;
    }

    public function store($title, $article)
    {
        if (empty($title) || empty($article)) {
            return false;
        }
        $sqlInsert = "INSERT INTO data_collected (title, article, date) VALUES ('$title','$article','1/1/1')";

        if (mysqli_query($this->connection, $sqlInsert)) {
            return true;
        }
        return false;
    }
}