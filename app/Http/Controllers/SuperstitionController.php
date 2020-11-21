<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuperstitionRequest;
use App\Models\Superstition;
use App\Services\Superstition\SuperstitionService;
use Illuminate\Http\Request;

class SuperstitionController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        return Superstition::paginate();
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $data = $request->getFormData();
        $this->superstitionService->storeSuperstition($data);
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

        return response()->json($data);
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
