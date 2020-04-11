<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\StoreDataController;

class TestStoreData extends TestCase
{
    public function testStoreDataHasReturned()
    {
        $storeData = $this->getMockBuilder(StoreDataController::class)
            ->setMethods(['index'])
            ->getMock();

        $storeData->method('index')->willReturn(true);

        $result = $storeData->index();

        $this->assertTrue($result);
    }
}
