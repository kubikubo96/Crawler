<?php

require_once __DIR__ . "/../../app/crawler/CrawlerInterface.php";
require_once __DIR__ . "/../../app/crawler/Crawler.php";
require_once __DIR__ . "/../../app/crawler/pages/VietnamnetCrawler.php";

use PHPUnit\Framework\TestCase;
use App\Crawler\VietnamnetCrawler;

class VietnamnetTest extends TestCase
{
    protected $vietnamnet;
    protected $uri = "https://vietnamnet.vn/vn/thoi-su/kham-nghiem-lan-2-hien-truong-vu-tien-si-bui-quang-tin-roi-lau-tu-vong-632414.html";

    public function setUp(): void
    {
        $this->vietnamnet = new VietnamnetCrawler($this->uri);
    }

    public function testTitleVietnamnetReturnNotNull()
    {
        $this->assertNotEquals('', $this->vietnamnet->getTitle());
    }

    public function testArticleVietnamnetReturnNotNull()
    {
        $this->assertNotEquals('', $this->vietnamnet->getArticle());
    }

    public function testDateVietnamnetReturnNotNull()
    {
        $this->assertNotEquals('', $this->vietnamnet->getDate());
    }
}