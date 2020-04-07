<?php

namespace App\Abstract_factory;

use App\Crawler\CrawlerInterface;
use App\Crawler\DantriCrawler;

class DantriFactory implements FactoryInterface
{
    public $uri;

    public function __construct($uri)
    {
        $this->uri = $uri;
    }

    public function makeGetData(): CrawlerInterface
    {
        return new DantriCrawler($this->uri);
    }
}
