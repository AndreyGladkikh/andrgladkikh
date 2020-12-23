<?php


namespace AndrGladkikh\Service;


class ArraySorter
{
    public static function sortByElementLength(array $array)
    {
        return usort($array, function ($a, $b) {
            return strlen($b)-strlen($a);
        });
    }
}