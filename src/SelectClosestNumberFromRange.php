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


namespace AndyDune;
use AndyDune\ConditionalExecution\ConditionHolder;

class SelectClosestNumberFromRange
{
    protected $numberSet = [];

    protected $selectLow = true;

    public function __construct($numberSet)
    {
        sort($numberSet, SORT_NUMERIC);
        $this->numberSet = $numberSet;
    }

    public function select($number)
    {
        $self = $this;
        $count = 1;
        $previousValue = null;
        foreach ($this->numberSet as $currentNumber) {
            $condSub = new ConditionHolder();
            $condSub->executeIfFalse(function () {
                return null;
            });
            $condSub->add(function ($value) use ($currentNumber) {
               return ($value < $currentNumber);
            });
            $condSub->executeIfTrue(function () use ($self, $previousValue, $currentNumber) {
                if ($self->selectLow) {
                    return $previousValue;
                }
                return $currentNumber;
            });

            $condition = new ConditionHolder();
            $condition->add($number == $currentNumber);
            $condition->bindOr();
            $condition->add($count == 1 and $number < $currentNumber);

            $condition->executeIfFalse($condSub);
            $condition->executeIfTrue(function () use ($currentNumber) {
                return $currentNumber;
            });

            $value = $condition->doIt($number);
            if ($value !== null) {
                return $value;
            }

            $previousValue = $currentNumber;
            $count++;
        }
        return $previousValue;
    }

    public function selectLow()
    {
        $this->selectLow = true;
        return $this;
    }

    public function selectHigh()
    {
        $this->selectLow = false;
        return $this;
    }
}