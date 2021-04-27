<?php


use PHPUnit\Framework\TestCase;

class WeatherMonitorTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testCorrectAverageIsReturned(): void
    {
        $service = $this->createMock(TemperatureService::class);

        $map = [
            ['12:00', 20],
            ['14:00', 26]
        ];

        $service->expects(self::exactly(2))
            ->method('getTemperature')
            ->will(self::returnValueMap($map));

        $weather = new WeatherMonitor($service);

        self::assertEquals(23, $weather->getAverageTemperature('12:00', '14:00'));
    }

    public function testCorrectAverageIsReturnedMockery()
    {
        $service = Mockery::mock(TemperatureService::class);

        $service->shouldReceive('getTemperature')
            ->once()
            ->with('12:00')
            ->andReturn(20);

        $service->shouldReceive('getTemperature')
            ->once()
            ->with('17:00')
            ->andReturn(26);

        $weather = new WeatherMonitor($service);

        self::assertEquals(23, $weather->getAverageTemperature('12:00', '17:00'));
    }
}