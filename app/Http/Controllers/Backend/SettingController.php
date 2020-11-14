<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use App\Models\Setting;
use Psr\Log\NullLogger;

class SettingController extends Controller
{
    /**
     * return all settings
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.setting', Setting::getSettings());
    }

    public function store(Request $request)
    {
        Setting::where ('key', '!=', NULL)->delete();

        foreach ($request->except('_token') as $key => $value) {
            $setting = new Setting;
            $setting->key = $key;
            $setting->value = $request->$key;
            $setting->save();
        }

        return redirect()->route('admin.settings.index');
    }
}
