<?php
use PHPUnit\Framework\TestCase;

class OrderusTest extends TestCase
{
    public function testRightGetName()
    {
        $order = new Orderus();
        $name = "Orderus";
        $this->assertEquals($name,$order->getName());

    }

    public function testErrorConditionGetName()
    {
        $order = new Orderus();
        $wrongName = "OrderThem";
        $this->assertNotEquals($wrongName,$order);

    }

    public function testBoundaryLimitRapidStrike()
    {
        $limitaInferioara = 0;
        $limitaSuperioara = 100;
        $order = new Orderus();
        $expectedResults= (rand($limitaInferioara,$limitaSuperioara) <= 10);
        $this->assertEquals($expectedResults,$order->rapidStrike());

    }

    public function testExistenceGetName()
   {
         $order = new Orderus();
         $expectedResult = null;
         $this->assertNotEquals($expectedResult,$order->getName());

   }

}