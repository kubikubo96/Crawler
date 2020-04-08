<?php

namespace App\Crawler\Crawler_factory;

use App\Crawler\VnexpressCrawler;
use App\Crawler\DantriCrawler;
use App\Crawler\VietnamnetCrawler;

//b4 Concrete Factory
class CrawlerFactory extends AbstractFactoryCrawler
{
    public $uri = null;

    public function __construct($uri)
    {
        $this->uri = $uri;
    }

    public function getData($domain)
    {
        switch (strtolower($domain)) {
            case "https://vnexpress.net/":
                return new VnexpressCrawler($this->uri);
                break;
            case "https://dantri.com.vn/":
                return new DantriCrawler($this->uri);
                break;
            case "https://vietnamnet.vn/":
                return new VietnamnetCrawler($this->uri);
                break;
            default:
                return null;
                break;
        }
    }
}