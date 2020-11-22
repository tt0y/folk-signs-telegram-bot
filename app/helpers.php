<?php
declare(strict_types=1);

namespace App;

/**
 * Class helpers
 * @package App
 */
class helpers
{
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

    public static function getMessageFormatted(array $data = [], $itemSeparator = '')
    {
        return $data['name'] . $itemSeparator . $data['description'];
    }
}
