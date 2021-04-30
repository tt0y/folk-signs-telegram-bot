<?php

namespace App\Http\Controllers;

use App\helpers;
use App\Http\Controllers\Api\APIBaseController;
use App\Models\Superstition;
use App\Services\Superstition\SuperstitionService;

class SuperstitionController extends APIBaseController
{
    /**
     * @var SuperstitionService
     */
    protected SuperstitionService $superstitionService;

    /**
     * SuperstitionController constructor.
     * @param SuperstitionService $superstitionService
     */
    public function __construct(
        SuperstitionService $superstitionService
    ) {
        $this->superstitionService = $superstitionService;
    }

    /**
     * @param $day
     * @param $month
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function showSuperstition($day, $month, $slug)
    {
        $superstition = Superstition::where([
            ['day', '=', $day],
            ['month', '=', $month],
        ])->first();

        if (!$superstition) {
            return;
        }

        return view('superstition', ['superstition' => $superstition]);
    }

    /**
     * Get superstition by link
     *
     * @param $day
     * @param $month
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function superstitionOnMain()
    {
        $data = $this->superstitionService->searchSuperstitions(helpers::dateExtra());
        $link = helpers::getTodayLink($data, PHP_EOL);

        if (!$data) {
            return null;
        }

        return view('welcome', ['superstition' => $data, 'link' => $link]);
    }
}
