<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $generalSetting = GeneralSetting::first();

        return view('root.setting.index', compact('generalSetting'));
    }

    public function generalSettingUpdate(Request $request)
    {
        $request->validate([
            'site_name' => ['required', 'max:200'],
            'layout' => ['required', 'max:200'],
            'contact_email' => ['required', 'max:200'],
            'currency' => ['required', 'max:200'],
            'currency_icon' => ['required', 'max:200'],
            'timezone' => ['required', 'max:200'],
        ]);

        GeneralSetting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => $request->site_name,
                'layout' => $request->layout,
                'contact_email' => $request->contact_email,
                'currency' => $request->currency,
                'currency_icon' => $request->currency_icon,
                'timezone' => $request->timezone
            ]
        );

        toastr('Updated Successfully', 'success');

        return redirect()->back();
    }
}
