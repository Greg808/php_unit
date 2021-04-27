<?php


use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    /**
     * this is needed to use mockery with php unit
     */
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testOrderIsProcessed(): void
    {
        $gateway = $this->getMockBuilder('PaymentGateway')
            ->setMethods(['charge'])
            ->getMock();

        $gateway->expects(self::once())
            ->method('charge')
            ->with(self::equalTo(200))
            ->willReturn(true);

        $order = new Order($gateway);
        $order->amount = 200;
        self::assertTrue($order->process());
    }

    public function testOrderIsProcessedUsingMockery(): void
    {
        $gateway = Mockery::mock('PaymentGateway');

        $gateway->shouldReceive('charge')
            ->once()
            ->with(200)
            ->andReturn(true);

        $order = new Order($gateway);

        $order->amount = 200;

        self::assertTrue($order->process());
    }
}