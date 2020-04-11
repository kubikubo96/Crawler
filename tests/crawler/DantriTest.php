<?php

use PHPUnit\Framework\TestCase;
use App\Crawler\DantriCrawler;

class DantriTest extends TestCase
{
    protected $dantri;
    protected $uri = "https://dantri.com.vn/xa-hoi/dem-nay-go-lenh-phong-toa-benh-vien-bach-mai-20200411161700001.htm";

    public function setUp(): void
    {
        $this->dantri = new DantriCrawler($this->uri);
    }

    public function testTitleDantriReturnNotNull()
    {
        $this->assertNotEquals('', $this->dantri->getTitle());
    }

    public function testArticleDantriReturnNotNull()
    {
        $this->assertNotEquals('', $this->dantri->getArticle());
    }

    public function testDateDantriReturnNotNull()
    {
        $this->assertNotEquals('', $this->dantri->getDate());
    }
}