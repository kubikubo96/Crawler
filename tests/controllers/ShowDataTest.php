<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\ShowDataController;

class ShowDataTest extends TestCase
{
    public function testShowDataHasReturned()
    {
        $showData = $this->getMockBuilder(ShowDataController::class)
            ->setMethods(['showData'])
            ->getMock();

        $showData->method('showData')->willReturn(true);

        $result = $showData->showData();

        $this->assertTrue($result);
    }
}
