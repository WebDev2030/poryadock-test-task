<?php

namespace App\BinarySearch;

class DataFactory
{
    private $itemsCount = 100000;
    private $min = -1000;
    private $max = 1000;

    public function createArray(): array
    {
        $arResult = [];

        for($i = 0; $i < $this->itemsCount; $i++) {
            $arResult[] = rand($this->min, $this->max);
        }

        sort($arResult);

        return $arResult;
    }

    /**
     * @param int $itemsCount
     */
    public function setItemsCount(int $itemsCount): void
    {
        $this->itemsCount = $itemsCount;
    }

    /**
     * @param mixed $max
     */
    public function setMax($max): void
    {
        if($this->min > $max) {
            throw new \Error('Your value mast be > min');
        }
        $this->max = $max;
    }

    /**
     * @param mixed $min
     */
    public function setMin($min): void
    {
        if($this->max < $min) {
            throw new \Error('Your value mast be > max');
        }

        $this->min = $min;
    }
}