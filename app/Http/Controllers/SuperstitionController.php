<?php

namespace App\Http\Controllers;

use App\helpers;
use App\Http\Controllers\Api\APIBaseController;
use App\Http\Requests\SuperstitionRequest;
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
     * Get superstition by link
     *
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

        if (!$superstition) return abort(404);

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
        $superstition = Superstition::where([
            ['day', '=', date('d')],
            ['month', '=', date('m')],
        ])->first();

        $data = $this->superstitionService->searchSuperstitions(helpers::dateExtra());
        $link = helpers::getTodayLink($data, PHP_EOL);

        if (!$superstition) return null;

        return view('welcome', ['superstition' => $superstition, 'link' => $link]);
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
