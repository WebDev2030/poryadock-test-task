<?php

namespace App\BinarySearch;

class BinarySearch
{
    /**
     * Ищет ближайшее к $num значение в массиве $ar
     * @param array $ar
     * @param int $num
     * @return int
     */
    public function searchNumber(array $ar, int $num):int{
        $result = -1;
        $minDelta = $this->getAbsMaxValue($ar);

        $range = [0, count($ar)-1];

        while($range[0] <= $range[1]) {
            $mid = intval(($range[0] + $range[1]) / 2);

            // Если нашли само число
            if($ar[$mid] == $num) {
                return $mid;
            } else {
                $delta = abs($num - $ar[$mid]);
                if($delta < $minDelta) {
                    $minDelta = $delta;
                    $result = $ar[$mid];
                }
            }

            if($ar[$mid] > $num)
                $range[1] = $mid - 1;
            else
                $range[0] = $mid + 1;
        }

        return $result;
    }

    /**
     * Находит максимальное по модулю значение в массиве.
     * @param array $ar
     * @return int
     */
    public function getAbsMaxValue(array $ar): int
    {
        return abs(min($ar)) > abs(max($ar)) ? abs(min($ar)) : abs(max($ar));
    }
}