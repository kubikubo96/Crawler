<?php

namespace App\Abstract_factory;

interface CrawlerInterface
{
    public function getTitle();

    public function getArticle();

    public function getDate();
}
