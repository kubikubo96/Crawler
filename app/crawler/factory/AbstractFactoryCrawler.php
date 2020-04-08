<?php

namespace App\Crawler\factory;

//b3 Abstract factory
abstract class AbstractFactoryCrawler
{
    abstract function getData($domain);
}
