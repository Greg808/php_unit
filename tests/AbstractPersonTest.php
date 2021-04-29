<?php


use PHPUnit\Framework\TestCase;

class AbstractPersonTest extends TestCase
{
    public function testNameAndTitleIsReturned(): void
    {
        $person = new Doctor('Foo');
        self::assertIsString($person->getNameAndTitle());
        self::assertEquals('Dr. Foo', $person->getNameAndTitle());

    }

    public function testNameAndTitleIncludesValueFromGetTitle(): void
    {
        $abstractMock = $this->getMockBuilder(AbstractPerson::class)
            ->setConstructorArgs(['Foo'])
            ->getMockForAbstractClass();

        $abstractMock->expects(self::once())
            ->method('getTitle',)
            ->willReturn('Dr.');

        self::assertEquals('Dr. Foo', $abstractMock->getNameAndTitle());
    }

}