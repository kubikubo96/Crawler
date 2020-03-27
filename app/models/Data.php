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
}