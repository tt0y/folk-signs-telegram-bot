<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;

class SitemapController extends Controller
{
    public function index()
    {
        SitemapGenerator::create('https://primetki.ru')->writeToFile('sitemap.xml');
    }
}
