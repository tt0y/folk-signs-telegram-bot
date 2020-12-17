<?php
declare(strict_types=1);

namespace App;

/**
 * Class helpers
 * @package App
 */
class helpers
{
    public static $months = [
        1 => 'Января',
        2 => 'Февраля',
        3 => 'Марта',
        4 => 'Апреля',
        5 => 'Мая',
        6 => 'Июня',
        7 => 'Июля',
        8 => 'Августа',
        9 => 'Сентября',
        10 => 'Октября',
        11 => 'Ноября',
        12 => 'Декабря',
    ];

    /**
     * @param $daysCount
     * @param string $operation
     * @param string $timeUnit
     * @return array
     */
    public static function dateExtra($daysCount = 0, $operation = '+', $timeUnit = ' days')
    {
        $day   = date_create(date("Y-m-d"))->modify($operation.$daysCount.$timeUnit)->format("d");
        $month = date_create(date("Y-m-d"))->modify($operation.$daysCount.$timeUnit)->format("m");

        return [
            'day'   => $day,
            'month' => $month,
        ];
    }

    public static function getMessageFormatted(array $data = [], $itemSeparator = '', $doubleSeparator = false)
    {
        ($doubleSeparator)
            ? $itemSeparator = $itemSeparator . $itemSeparator
            : $itemSeparator = $itemSeparator

        (!empty($data['link']))
            ? $link = __('Подробнее:') . $itemSeparator . $data['link']
            : $link = '';

        return $data['name'] . $itemSeparator . $data['description'] . $itemSeparator . $link;
    }
}
