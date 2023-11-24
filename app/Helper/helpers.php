<?php
use Gloudemans\Shoppingcart\Facades\Cart;

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

    return intval($discountPercent);
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
