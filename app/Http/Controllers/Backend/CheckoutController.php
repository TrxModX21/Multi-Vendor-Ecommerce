<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShippingRule;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $addresses = UserAddress::where('user_id', Auth::user()->id)->get();
        $shippingMethods = ShippingRule::where('status', 1)->get();

        return view('frontend.pages.checkout', compact('addresses', 'shippingMethods'));
    }

    public function createAddress(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'phone' => ['required', 'max:50'],
            'email' => ['required', 'max:200', 'email'],
            'country' => ['required', 'max:200'],
            'state' => ['required', 'max:200'],
            'city' => ['required', 'max:200'],
            'zip' => ['required', 'max:200'],
            'address' => ['required'],
        ]);

        $userAddress = new UserAddress();

        $userAddress->user_id = Auth::user()->id;
        $userAddress->name = $request->name;
        $userAddress->phone = $request->phone;
        $userAddress->email = $request->email;
        $userAddress->country = $request->country;
        $userAddress->state = $request->state;
        $userAddress->city = $request->city;
        $userAddress->zip = $request->zip;
        $userAddress->address = $request->address;

        $userAddress->save();

        toastr('Address Created Successfully', 'success');

        return redirect()->route('user.checkout.index');
    }
}
