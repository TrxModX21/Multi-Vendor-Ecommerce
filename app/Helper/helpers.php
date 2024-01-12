<?php
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

/** SET SIDEBAR ITEM ACTIVE */
function setActive(array $route)
{
    if (is_array($route)) {
        foreach ($route as $r) {
            if (request()->routeIs($r)) {
                return 'active';
            }
        }
    }
}

/** CHECK IF PRODUCT HAVE DISCOUNT */
function checkDiscount($product)
{
    $currentDate = date('Y-m-d');

    if ($product->offer_price > 0 && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date) {
        return true;
    }

    return false;
}

/** CALCULATE DISCOUNT PERCENT */
function calculateDiscountPercent($originalPrice, $discountPrice)
{
    $discountAmount = $originalPrice - $discountPrice;
    $discountPercent = ($discountAmount / $originalPrice) * 100;

    return round($discountPercent);
}

/** CHECK THE PRODUCT TYPE */
function productType($type): string
{
    switch ($type) {
        case 'new_arrival':
            return 'New';
        case 'featured_product':
            return 'Featured';
        case 'top_product':
            return 'Top';
        case 'best_product':
            return 'Best';
        default:
            return '';
    }
}

/** GET TOTAL CART AMOUNT */
function getCartTotal()
{
    $total = 0;

    foreach (Cart::content() as $product) {
        $total += ($product->price + $product->options->variantsTotal) * $product->qty;
    }

    return $total;
}


/** GET PAYABLE TOTAL AMOUNT */
function getMainCartTotal()
{
    if (Session::has('coupon')) {
        $coupon = Session::get('coupon');
        $subTotal = getCartTotal();

        if ($coupon['discount_type'] === 'amount') {
            $total = $subTotal - $coupon['discount'];

            return $total;
        } elseif ($coupon['discount_type'] === 'percent') {
            $discount = $subTotal * $coupon['discount'] / 100;
            $total = $subTotal - $discount;

            return $total;
        }
    } else {
        return getCartTotal();
    }
}

/** GET CART DISCOUNT */
function getCartDiscount()
{
    if (Session::has('coupon')) {
        $coupon = Session::get('coupon');
        $subTotal = getCartTotal();

        if ($coupon['discount_type'] === 'amount') {
            return $coupon['discount'];
        } elseif ($coupon['discount_type'] === 'percent') {
            $discount = $subTotal * $coupon['discount'] / 100;

            return $discount;
        }
    } else {
        return 0;
    }
}

/** GET SELECTED SHIPPING FEE FROM SESSION */
function getShippingFee()
{
    if (Session::has('shipping_method')) {
        return Session::get('shipping_method')['cost'];
    } else {
        return 0;
    }
}

/** GET PAYABLE AMOUNT */
function getFinalPayableAmount()
{
    return getMainCartTotal() + getShippingFee();
}

/** LIMIT TEXT */
function limitText($text, $limit = 20)
{
    return \Str::limit($text, $limit);
}