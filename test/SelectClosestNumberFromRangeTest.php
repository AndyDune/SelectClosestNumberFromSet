<?php
/**
 *
 * PHP version >= 5.6
 *
 * @package andydune/array-container
 * @link  https://github.com/AndyDune/ArrayContainer for the canonical source repository
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @author Andrey Ryzhov  <info@rznw.ru>
 * @copyright 2018 Andrey Ryzhov
 */


namespace AndyDune\SelectClosestNumberFromRangeTest;
use PHPUnit\Framework\TestCase;
use AndyDune\SelectClosestNumberFromRange;

class SelectClosestNumberFromRangeTest extends TestCase
{
    public function testIt()
    {
        $object = new SelectClosestNumberFromRange([0, 20, 40]);

        $this->assertEquals(0, $object->select(-5));
        $this->assertEquals(0, $object->select(5));
        $this->assertEquals(20, $object->select(20));
        $this->assertEquals(20, $object->select(25));
        $this->assertEquals(20, $object->select(39));
        $this->assertEquals(40, $object->select(40));
        $this->assertEquals(40, $object->select(40.5));

        $object->selectHigh();
        $this->assertEquals(0, $object->select(-5));
        $this->assertEquals(20, $object->select(5));
        $this->assertEquals(20, $object->select(20));
        $this->assertEquals(40, $object->select(25));
        $this->assertEquals(40, $object->select(39));
        $this->assertEquals(40, $object->select(40));
        $this->assertEquals(40, $object->select(40.5));
    }
}
