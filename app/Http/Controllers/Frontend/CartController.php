<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

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

    public function cartDetails()
    {
        $cartItems = Cart::content();

        return view('frontend.pages.cart-detail', compact('cartItems'));
    }
}
