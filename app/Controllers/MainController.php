<?php

namespace App\Controllers;

use App\BinarySearch\BinarySearch;
use App\BinarySearch\DataFactory;
use App\Poryadok\Utils\Str;
use Pecee\SimpleRouter\SimpleRouter;


class MainController
{
    const DEFAULT_STR = 'abccdceffgihhhhj';

    function index()
    {
        SimpleRouter::response()->json([
            SimpleRouter::getUrl('second-chart-by-frequency'),
            SimpleRouter::getUrl('is-pollyndrom')
        ]);
    }

    /**
     * Возвращает второй по частотности символ в переданной в качестве get-параметра "str" строки
     * Возможные ошибки:
     * - стока передана короткая строка менее двух символов
     * - в строке встречается только 1 символ
     * @return void
     */
    function getSecondChartByFrequencyInString()
    {
        $request = SimpleRouter::request();
        $inputHandler = $request->getInputHandler();
        $str = '';

        if ($inputHandler->get('str')) {
            $str = $inputHandler->get('str')->value;
        }

        if (strlen($str) <= 0) {
            $str = self::DEFAULT_STR;
        }


        if (strlen($str) <= 1) {
            SimpleRouter::response()->json([
                'error' => 'String too short'
            ]);
            return;
        }

        $arChars = Str::getSortedByFrequencyArrayOfCharsWithCount($str);

        if (count($arChars) <= 1) {
            SimpleRouter::response()->json([
                'error' => 'There is only 1 character in a string'
            ]);

            return;
        }

        $result = array_keys($arChars)[1];

        SimpleRouter::response()->json([
            $result
        ]);
    }

    /**
     * Является лим переданная в качестве get-параметра "str" строка поллиндромом
     * @return void
     */
    function isPollyndrom()
    {
        $request = SimpleRouter::request();
        $inputHandler = $request->getInputHandler();
        $str = '';

        if ($inputHandler->get('str')) {
            $str = $inputHandler->get('str')->value;
        }

        if (strlen($str) <= 0) {
            $str = self::DEFAULT_STR;
        }

        $result = Str::isPollyndrom($str);
        SimpleRouter::response()->json([
            $result
        ]);
    }

    public function binarySearch() {
        $dataFactory = (new DataFactory());
        $dataFactory->setItemsCount(10);
        $ar = $dataFactory->createArray();
        $num = -100;

        $result = (new BinarySearch())->searchNumber($ar, $num);

        SimpleRouter::response()->json([
            'array' => $ar,
            'num' => $num,
            'result' => $result
        ]);
    }
}