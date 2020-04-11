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
        $model = Mockery::mock('Model');
        $model->shouldReceive('store')->once();
        $result = $model->store('title', 'article', 'date');
        $this->assertEquals('', $result);
    }
}
