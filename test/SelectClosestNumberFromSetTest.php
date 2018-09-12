<?php
/**
 *
 * PHP version >= 5.6
 *
 * @package andydune/select-closest-number-from-set
 * @link  https://github.com/AndyDune/SelectClosestNumberFromSet for the canonical source repository
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @author Andrey Ryzhov  <info@rznw.ru>
 * @copyright 2018 Andrey Ryzhov
 */


namespace AndyDune\SelectClosestNumberFromSetTest;
use PHPUnit\Framework\TestCase;
use AndyDune\SelectClosestNumberFromSet;

class SelectClosestNumberFromSetTest extends TestCase
{
    public function testIt()
    {
        $object = new SelectClosestNumberFromSet([0, 20, 40]);

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
