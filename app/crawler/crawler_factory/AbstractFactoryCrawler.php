<?php

namespace App\Crawler\Crawler_factory;

//b3 Abstract factory
abstract class AbstractFactory
{
    abstract function getData($domain);
}
