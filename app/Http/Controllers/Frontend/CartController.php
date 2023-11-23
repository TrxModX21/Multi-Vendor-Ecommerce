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

    public function updateProductQuantity(Request $request)
    {
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
}
