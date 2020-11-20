<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignRequest;
use App\Models\Superstition;
use Illuminate\Http\Request;

class SuperstitionController extends Controller
{
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Superstition|\Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request)
    {
        return Superstition::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param $day
     * @param $month
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($day, $month)
    {
        $sign = Superstition::where([
            ['day', '=', $day],
            ['month', '=', $month],
        ])->get()->toArray();

        return response()->json($sign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SignRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SignRequest $request, $id)
    {
        $sign = Superstition::findOrFail($id);
        $sign->fill($request->except(['sign_id']));
        $sign->save();

        return response()->json($sign);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Superstition  $sign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Superstition $sign)
    {
        $sign = Superstition::findOrFail($sign->id);
        if($sign->delete()) return response(null, 204);
    }
}
