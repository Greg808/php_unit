<?php


use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    protected Item $item;
    protected Item $itemChild;

    public function setUp(): void
    {
        $this->item = new Item();
        $this->itemChild = new ItemChild();
    }

    public function testItemGetDescriptionIsNotEmpty(): void
    {
        self::assertNotEmpty($this->item->getDescription());
    }

    /** test protected methode */
    public function testIdIsAnInteger(): void
    {
        self::assertIsInt($this->itemChild->getID());
    }

    /** test private methode */
    public function testTokenIsAString(): void
    {
        $reflector = new ReflectionClass(Item::class);
        $methode = $reflector->getMethod('getToken');
        $methode->setAccessible(true);
        $result = $methode->invoke($this->item);
        self::assertIsString($result);
    }

    /** test private methode with arguments */
    public function testPrefixedTokenStartsWithPrefix(): void
    {
        $reflector = new ReflectionClass(Item::class);
        $methode = $reflector->getMethod('getPrefixedToken');
        $methode->setAccessible(true);
        $result = $methode->invoke(
            $this->item,
            'foo'
        );

        self::assertStringStartsWith('foo', $result);
    }
}