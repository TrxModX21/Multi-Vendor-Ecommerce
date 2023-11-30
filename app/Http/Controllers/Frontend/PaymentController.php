<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\PaypalSetting;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
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

    public function storeOrder($paymentMethod, $paymentStatus, $transactionId, $paidAmount, $paidCurrencyName)
    {
        $settings = GeneralSetting::first();
        $order = new Order();

        $order->invoice_id = rand(1, 999999);
        $order->user_id = Auth::user()->id;
        $order->sub_total = getMainCartTotal();
        $order->amount = getFinalPayableAmount();
        $order->currency_name = $settings->currency;
        $order->currency_icon = $settings->currency_icon;
        $order->product_qty = Cart::content()->count();
        $order->payment_method = $paymentMethod;
        $order->payment_status = $paymentStatus;
        $order->order_address = json_encode(Session::get('address'));
        $order->shipping_method = json_encode(Session::get('shipping_method'));
        $order->coupon = Session::has('coupon') ? json_encode(Session::get('coupon')) : '[]';
        $order->order_status = 0;

        $order->save();

        /** STORE ORDER PRODUCT */
        foreach (Cart::content() as $item) {

            $product = Product::find($item->id);
            $orderProduct = new OrderProduct();

            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $product->id;
            $orderProduct->vendor_id = $product->vendor_id;
            $orderProduct->product_name = $product->name;
            $orderProduct->variants = json_encode($item->options->variants);
            $orderProduct->variant_total = json_encode($item->options->variantsTotal);
            $orderProduct->unit_price = $item->price;
            $orderProduct->qty = $item->qty;

            $orderProduct->save();
        }

        /** STORE TRANSACTIONS DETAILS */
        $transactions = new Transaction();

        $transactions->order_id = $order->id;
        $transactions->transaction_id = $transactionId;
        $transactions->payment_method = $paymentMethod;
        $transactions->amount = getFinalPayableAmount();
        $transactions->amount_real_currency = $paidAmount;
        $transactions->amount_real_currency_name = $paidCurrencyName;

        $transactions->save();
    }

    public function clearSession()
    {
        Cart::destroy();
        Session::forget('address');
        Session::forget('shipping_method');
        Session::forget('coupon');
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
        $paypalSetting = PaypalSetting::first();
        $config = $this->paypalConfig();

        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            /** CALCULATE PAYABLE AMOUNT DEPENDING ON CURRENCY RATE */
            $total = getFinalPayableAmount();
            $paidAmount = round($total * $paypalSetting->currency_rate, 2);

            $this->storeOrder('paypal', 1, $response['id'], $paidAmount, $paypalSetting->currency);

            /** CLEAR SESSION */
            $this->clearSession();

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
