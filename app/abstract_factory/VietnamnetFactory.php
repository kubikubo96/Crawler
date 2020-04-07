<?php

namespace App\Abstract_factory;

use App\Crawler\VietnamnetCrawler;
use App\Crawler\CrawlerInterface;

class VietnamnetFactory implements FactoryInterface
{
    public $uri;

    public function __construct($uri)
    {
        $this->uri = $uri;
    }

    public function makeGetData(): CrawlerInterface
    {
        return new VietnamnetCrawler($this->uri);
    }
}
