<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function cartDetails()
    {
        $cartItems = Cart::content();

        if (count($cartItems) === 0) {
            return redirect()->route('home');
        }

        return view('frontend.pages.cart-detail', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        if ($product->qty === 0) {
            return response([
                'status' => 'error',
                'message' => 'Product Stock Out!',
            ]);
        } elseif ($product->qty < $request->qty) {
            return response([
                'status' => 'error',
                'message' => 'Quantity Not Available In Our Stock!',
            ]);
        }

        $variants = [];
        $variantTotalAmount = 0;

        if ($request->has('variant_items')) {
            foreach ($request->variant_items as $item_id) {
                $variantItem = ProductVariantItem::find($item_id);
                $variants[$variantItem->productVariant->name]['name'] = $variantItem->name;
                $variants[$variantItem->productVariant->name]['price'] = $variantItem->price;
                $variantTotalAmount += $variantItem->price;
            }
        }

        $productPrice = 0;
        if (checkDiscount($product)) {
            $productPrice = $product->offer_price;
        } else {
            $productPrice = $product->price;
        }

        $cartData = [
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $productPrice,
            'weight' => 10,
            'options' => [
                'variants' => $variants,
                'variantsTotal' => $variantTotalAmount,
                'image' => $product->thumb_image,
                'slug' => $product->slug
            ]
        ];

        Cart::add($cartData);

        return response([
            'status' => 'success',
            'message' => 'Added to cart successfully!'
        ]);
    }

    public function updateProductQuantity(Request $request)
    {
        $id = Cart::get($request->rowId)->id;
        $product = Product::findOrFail($id);

        if ($product->qty === 0) {
            return response([
                'status' => 'error',
                'message' => 'Product Stock Out!',
            ]);
        } elseif ($product->qty < $request->qty) {
            return response([
                'status' => 'error',
                'message' => 'Quantity Not Available In Our Stock!',
            ]);
        }

        Cart::update($request->rowId, $request->qty);

        $productTotal = $this->getProductTotal($request->rowId);

        return response([
            'status' => 'success',
            'message' => 'Product Qty Updated!',
            'product_total' => $productTotal,
        ]);
    }

    public function getProductTotal($rowId)
    {
        $product = Cart::get($rowId);

        $total = ($product->price + $product->options->variantsTotal) * $product->qty;

        return $total;
    }

    public function cartTotal()
    {
        $total = 0;

        foreach (Cart::content() as $product) {
            $total += $this->getProductTotal($product->rowId);
        }

        return $total;
    }

    public function clearCart()
    {
        Cart::destroy();

        return response([
            'status' => 'success',
            'message' => 'Cart Cleared Successfully!'
        ]);
    }

    public function removeCartItem($rowId)
    {
        Cart::remove($rowId);

        toastr('Cart Item Remove Successfully!', 'success');

        return redirect()->back();
    }

    public function getCartCount()
    {
        return Cart::content()->count();
    }

    public function getCartProducts()
    {
        return Cart::content();
    }

    public function removeSidebarProduct(Request $request)
    {
        Cart::remove($request->rowId);

        return response([
            'status' => 'success',
            'message' => 'Cart Item Remove Successfully!'
        ]);
    }

    public function applyCoupon(Request $request)
    {
        if ($request->coupon_code === null) {
            return response([
                'status' => 'error',
                'message' => 'Coupon code is required!'
            ]);
        }

        $coupon = Coupon::where([
            'code' => $request->coupon_code,
            'status' => 1
        ])->first();

        if ($coupon === null) {
            return response([
                'status' => 'error',
                'message' => 'Coupon is not exists!'
            ]);
        } else if ($coupon->start_date < date('Y-m-d')) {
            return response([
                'status' => 'error',
                'message' => 'Coupon is not exists!'
            ]);
        } else if ($coupon->end_date < date('Y-m-d')) {
            return response([
                'status' => 'error',
                'message' => 'Coupon expired!'
            ]);
        }
    }
}
