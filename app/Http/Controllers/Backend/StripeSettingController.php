<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StripeSetting;
use Illuminate\Http\Request;

class StripeSettingController extends Controller
{
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => ['required', 'integer'],
            'account_mode' => ['required', 'integer'],
            'country_name' => ['required', 'max:200'],
            'currency' => ['required', 'max:200'],
            'currency_rate' => ['required'],
            'client_id' => ['required'],
            'secret_key' => ['required'],
        ]);

        StripeSetting::updateOrCreate(
            ['id' => $id],
            [
                'status' => $request->status,
                'account_mode' => $request->account_mode,
                'country_name' => $request->country_name,
                'currency' => $request->currency,
                'currency_rate' => $request->currency_rate,
                'client_id' => $request->client_id,
                'secret_key' => $request->secret_key,
            ]
        );

        toastr('Stripe Setting Updated Successfully!', 'success');
        
        return redirect()->back();
    }
}
