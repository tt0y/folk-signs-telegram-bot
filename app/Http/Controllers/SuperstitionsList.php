<?php

namespace App\Http\Controllers;

use App\Models\Superstition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class SuperstitionsList extends Controller
{
    public function index()
    {
        $sups = Superstition::all()->toArray();

        foreach ($sups as $sup) {
            echo '<br><a href="'. URL::to('/') . '/' . $sup['day'] . '/' . $sup['month'] . '/' . Str::slug($sup['name']) . '">'.$sup['name'].'</a>';

        }
    }
}
