<?php

namespace App\Poryadok\Utils;

class Str
{
    /**
     * Возвращает второй по частотности символ из строки
     * @param string $str
     * @return array
     */
    static function getSortedByFrequencyArrayOfCharsWithCount(string $str): array
    {
        $chars = (mb_str_split($str));
        $uniqueChars = array_unique($chars);
        $arCount = [];

        foreach ($uniqueChars as $char) {
            $i = 0;
            foreach ($chars as $char2) {
                if ($char == $char2) {
                    $i++;
                }
            }
            $arCount[$char] = $i;
        }

        uasort($arCount, function ($a, $b) {
            return ($a < $b) ? 1 : -1;
        });

        return $arCount;
    }

    /**
     * Определяет являться ли строка полиндромом
     * @param string $str
     * @return bool
     */
    static function isPollyndrom(string $str): bool
    {
        return self::mb_strrev($str) == $str;
    }

    /**
     * Переворачивает строку даже с учётом кириллицы (mb)
     * @param $str
     * @return string
     */
    static function mb_strrev($str){
        $r = '';
        for ($i = mb_strlen($str); $i>=0; $i--) {
            $r .= mb_substr($str, $i, 1);
        }
        return $r;
    }
}