<?php

namespace App\Http\Controllers\Admin;

use App\Models\Superstition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuperstitionsController extends Controller
{
    public function index()
    {
        $superstition = new Superstition();

        $superstitions = $superstition->get();

        return view('admin.superstitions.index', ['superstitions' => $superstitions]);
    }

    public function addSuperstition()
    {
        return view('admin.superstitions.add');
    }

    public function addRequestSuperstition(Request $request)
    {
        $superstition = new Superstition();
        $superstition->create([
            'name' => $request->input('name'),
            'day' => $request->input('day'),
            'month' => $request->input('month'),
            'description' => $request->input('description'),
        ]);

        if($superstition){
            return redirect()->route('superstitions')->with('success', 'Приметка успешно добавлена');
        }
        return back()->with('error', 'Ошибка добавления Приметки');
    }

    public function editSuperstition($id)
    {
        $superstition = Superstition::find($id);

        if (!$superstition) abort(404);

        return view('admin.superstitions.edit', ['superstition' => $superstition]);
    }

    public function editRequestSuperstition(Request $request, $id)
    {
        $superstition = Superstition::find($id);

        if (!$superstition) abort(404);

        $superstition->name = $request->input('name');
        $superstition->day = $request->input('day');
        $superstition->month = $request->input('name');
        $superstition->description = $request->input('description');

        if($superstition->save()){
            return redirect()->route('superstitions')->with('success', 'Приметка успешно обновлена');
        }

        return back()->with('error', 'Ошибка обновления Приметки');
    }

    public function deleteSuperstition(Request $request)
    {
        if($request->ajax()){
            $id = (int)$request->input('id');

            $superstition = new Superstition();

            $superstition->where('id', $id)->delete();

            echo "Успех";
        }
    }
}
