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
        1 => 'января',
        2 => 'февраля',
        3 => 'марта',
        4 => 'апреля',
        5 => 'мая',
        6 => 'июня',
        7 => 'июля',
        8 => 'августа',
        9 => 'сентября',
        10 => 'октября',
        11 => 'ноября',
        12 => 'декабря',
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

    public static function getMessageFormatted(array $data = [], $itemSeparator = '', $doubleSeparator = true)
    {
        ($doubleSeparator)
            ? $itemSeparatorX2 = $itemSeparator . $itemSeparator
            : $itemSeparatorX2 = $itemSeparator;

        (!empty($data['link']))
            ? $link = __('Подробнее:') . $itemSeparator . $data['link']
            : $link = '';

        return $data['name'] . $itemSeparatorX2 . $data['description'] . $itemSeparatorX2 . $link;
    }
}
