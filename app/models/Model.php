<?php

namespace App\Models;

class Model
{
    public function getAllData()
    {
        global $connection;
        $sqlSelect = "SELECT * FROM data_collected";
        return $connection->query($sqlSelect);
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