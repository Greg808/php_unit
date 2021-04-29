<?php


use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /** test protected property  */
    public function testIdIsAnInteger(): void
    {
        $product = new Product();
        $reflector = new ReflectionClass(Product::class);
        $property = $reflector->getProperty('product_id');
        $property->setAccessible(true);
        $result = $property->getValue($product);
        self::assertIsInt($result);
    }
}