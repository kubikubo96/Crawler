<?php

require __DIR__ . "/../../app/crawler/Crawler.php";
require __DIR__ . "/../../app/crawler/CrawlerInterface.php";
require __DIR__ . "/../../app/crawler/pages/VnexpressCrawler.php";

use PHPUnit\Framework\TestCase;
use App\Crawler\VnexpressCrawler;

class VnexpressTest extends TestCase
{
    protected $vnexpress;
    protected $uri = "https://vnexpress.net/cong-ty-nhieu-lao-dong-nhat-sai-gon-ngung-hoat-dong-4083173.html";

    public function setUp(): void
    {
        $this->vnexpress = new VnexpressCrawler($this->uri);
    }

    public function testTitleVnexpressReturnedNotNull()
    {
        $this->assertNotEquals('', $this->vnexpress->getTitle());
    }

    public function testArticleVnexpressReturnedNotNull()
    {
        $this->assertNotEquals('', $this->vnexpress->getArticle());
    }

    public function testDateVnexpressReturnedNotNull()
    {
        $this->assertNotEquals('', $this->vnexpress->getDate());
    }
}
