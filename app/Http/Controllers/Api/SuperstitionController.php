<?php

namespace App\Http\Controllers\Api;

use App\helpers;
use App\Http\Controllers\Api\APIBaseController;
use App\Http\Requests\SuperstitionRequest;
use App\Http\Resources\SuperstitionResource;
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

    public function index(Request $request)
    {
        $limit = (int)$request->get('limit');

        if ($limit != 0) {
            $carBrands = Superstition::take($limit)->get();
        } else {
            $carBrands = Superstition::all();
        }
        if (!$carBrands) {
            return $this->sendError([], __('The reviews was not found'));
        }

        return $this->sendResponse(SuperstitionResource::collection($carBrands), '');
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
            return $this->sendError([], __('The superstition was not found'));
        }

        return $this->sendResponse(SuperstitionResource::collection($data), '');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SuperstitionRequest $request
     * @param Superstition $superstition
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SuperstitionRequest $request, Superstition $superstition)
    {
        $data = $this->superstitionService->updateSuperstition($superstition, $request->all());

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Superstition $superstition
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Superstition $superstition)
    {
        $superstition = Superstition::findOrFail($superstition->id);

        if($superstition->delete())
            return response(null, 204);
    }
}
