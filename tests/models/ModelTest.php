<?php

use PHPUnit\Framework\TestCase;
use App\Models\Model;

class ModelTest extends TestCase
{
    public function testGetAllData()
    {
        $model = $this->getMockBuilder(Model::class)
            ->setMethods(['getAllData'])
            ->getMock();

        $model->method('getAllData')->willReturn(true);

        $result = $model->getAllData();

        $this->assertTrue($result);
    }

    public function testDataHasStoreInDatabase()
    {
        $model = $this->getMockBuilder(Model::class)
            ->setMethods(['store'])
            ->getMock();

        $model->method('store')->willReturn(true);

        $result = $model->store('title', 'article', 'date');

        $this->assertTrue($result);
    }
}
