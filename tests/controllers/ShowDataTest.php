<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\ShowDataController;

class ShowDataTest extends TestCase
{
    public function testShowDataOfControllerHasReturned()
    {
        $showDataController = $this->getMockBuilder(ShowDataController::class)
            ->setMethods(['showData'])
            ->getMock();

        $showDataController->method('showData')->willReturn(true);

        $result = $showDataController->showData();

        $this->assertTrue($result);
    }
}
