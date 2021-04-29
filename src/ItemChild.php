<?php
/**
 * Class ItemChild
 * Test protected methode through inheritance
 */

class ItemChild extends Item
{
    /**
     * overwrite accessor in child class
     * @return int
     */
    public function getID(): int
    {
        return parent::getID();
    }

}