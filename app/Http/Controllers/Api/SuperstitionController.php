<?php

namespace App\Http\Controllers;

use App\helpers;
use App\Http\Controllers\Api\APIBaseController;
use App\Http\Requests\SuperstitionRequest;
use App\Http\Resources\SuperstitionResource;
use App\Models\Article;
use App\Models\Superstition;
use App\Services\Superstition\SuperstitionService;
use Illuminate\Http\Request;

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
    )
    {
        $this->superstitionService = $superstitionService;
    }

    /**
     * Display the specified resource.
     *
     * @param Superstition $superstition
     * @param $day
     * @param $month
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(SuperstitionService $superstition, $day, $month)
    {
        $data = $superstition->searchSuperstitions([
            'day' => $day,
            'month' => $month
        ]);

        if (!$data) {
            return $this->sendError([], __('The reviews was not found'));
        }

        return $this->sendResponse(SuperstitionResource::collection($data), '');
    }
}
