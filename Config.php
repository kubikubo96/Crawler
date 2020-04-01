<?php

class Config
{
    public $connection;

    const DATABASE_SERVER = "localhost";

    const DATABASE_USER = "root";

    const DATABASE_PASSWORD = "root";

    const DATABASE_NAME = "crawler";

    public function __construct()
    {
        if (!$this->connection) {
            $this->connection = mysqli_connect(self::DATABASE_SERVER, self::DATABASE_USER,
                self::DATABASE_PASSWORD, self::DATABASE_NAME);
        }
    }
}