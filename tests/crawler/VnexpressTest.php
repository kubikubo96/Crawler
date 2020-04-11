<?php

use PHPUnit\Framework\TestCase;
use App\Crawler\VnexpressCrawler;

class VnexpressTest extends TestCase
{
    protected $vnexpress;
    protected $uri = "https://vnexpress.net/hon-102-000-nguoi-chet-vi-ncov-toan-cau-4083004.html";

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
