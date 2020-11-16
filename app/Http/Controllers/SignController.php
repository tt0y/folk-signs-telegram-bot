<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignRequest;
use App\Models\Sign;
use Illuminate\Http\Request;

class SignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        return Sign::paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Sign|\Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request)
    {
        return Sign::create($request->validated());
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
        $sign = Sign::where([
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
        $sign = Sign::findOrFail($id);
        $sign->fill($request->except(['sign_id']));
        $sign->save();

        return response()->json($sign);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sign $sign)
    {
        $sign = Sign::findOrFail($sign->id);
        if($sign->delete()) return response(null, 204);
    }
}
