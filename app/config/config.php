<?php

$host = "localhost";
$user = "root";
$password = "root";
$database = "crawler";

$connection = new mysqli($host, $user, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}