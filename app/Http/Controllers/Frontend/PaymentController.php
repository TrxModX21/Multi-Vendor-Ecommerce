<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PaypalSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function index()
    {
        if (!Session::has('address')) {
            return redirect()->route('user.checkout.index');
        }
        return view('frontend.pages.payment');
    }

    public function paymentSuccess()
    {
        return view('frontend.pages.payment-success');
    }

    public function paypalConfig()
    {
        $paypalSetting = PaypalSetting::first();

        $config = [
            'mode' => $paypalSetting->account_mode === 1 ? 'live' : 'sandbox',
            'sandbox' => [
                'client_id' => $paypalSetting->client_id,
                'client_secret' => $paypalSetting->secret_key,
                'app_id' => '',
            ],
            'live' => [
                'client_id' => $paypalSetting->client_id,
                'client_secret' => $paypalSetting->secret_key,
                'app_id' => '',
            ],

            'payment_action' => 'Sale',
            'currency' => $paypalSetting->currency,
            'notify_url' => '',
            'locale' => 'en_US',
            'validate_ssl' => true,
        ];

        return $config;
    }

    /** PAYPAL REDIRECt */
    public function payWithPaypal(Request $request)
    {
        $paypalSetting = PaypalSetting::first();
        $config = $this->paypalConfig();

        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        /** CALCULATE PAYABLE AMOUNT DEPENDING ON CURRENCY RATE */
        $total = getFinalPayableAmount();
        $payableAmount = round($total * $paypalSetting->currency_rate, 2);

        $response = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('user.paypal.success'),
                'cancel_url' => route('user.paypal.cancel'),
            ],
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => $config['currency'],
                        'value' => $payableAmount,
                    ],
                ],
            ],
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('user.paypal.cancel');
        }
    }

    public function paypalSuccess(Request $request)
    {
        $config = $this->paypalConfig();

        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()->route('user.payment-success');
        }

        return redirect()->route('user.paypal.cancel');
    }

    public function paypalCancel()
    {
        toastr('Payment Failed', 'error');

        return redirect()->route('user.payment');
    }
}
