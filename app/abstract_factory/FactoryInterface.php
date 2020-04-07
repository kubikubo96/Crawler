<?php

namespace App\Abstract_factory;

use App\Crawler\CrawlerInterface;

interface FactoryInterface
{
    public function makeGetData() : CrawlerInterface;
}