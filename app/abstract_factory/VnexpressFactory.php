<?php

namespace App\Abstract_factory;

use App\Crawler\VnexpressCrawler;
use App\Crawler\CrawlerInterface;

class VnexpressFactory implements FactoryInterface
{
    public $uri;

    public function __construct($uri)
    {
        $this->uri = $uri;
    }

    public function makeGetData(): CrawlerInterface
    {
        return new VnexpressCrawler($this->uri);
    }
}