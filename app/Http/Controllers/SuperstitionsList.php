<?php

namespace App\Http\Controllers;

use App\Models\Superstition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class SuperstitionsList extends Controller
{
    protected $arMonths = array(
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
        12 => 'Декабря');

    public function index()
    {
        $sups = Superstition::all()->toArray();

        foreach ($sups as $sup) {
            echo '<br><a href="' . URL::to('/') . '/' . $sup['day'] . '/' . $sup['month'] . '/' . Str::slug($sup['name']) . '">' . 'Народные приметы на ' . $sup['day'] . ' ' . $this->arMonths[(int)$sup['month']] . ' ' . $sup['name'] . '</a>';
        }
    }
}
