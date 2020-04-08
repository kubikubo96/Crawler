<?php

namespace App\Crawler\Crawler_factory;

//b3 Abstract factory
abstract class AbstractFactoryCrawler
{
    abstract function getData($domain);
}
