<?php

namespace App\Http\Controllers\Backend;

use App\Models\ProductVariantItem;
use App\DataTables\ProductVariantItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantItemController extends Controller
{
    public function index(ProductVariantItemDataTable $dataTable, $productId, $variantId)
    {
        $product = Product::findOrFail($productId);
        $variant = ProductVariant::findOrFail($variantId);

        return $dataTable->render('root.product.variant-item.index', compact('product', 'variant'));
    }

    public function create(string $productId, string $variantId)
    {
        $product = Product::findOrFail($productId);
        $variant = ProductVariant::findOrFail($variantId);

        return view('root.product.variant-item.create', compact('variant', 'product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'variant_id' => ['required', 'integer'],
            'name' => ['required', 'max:200'],
            'price' => ['required', 'integer'],
            'is_default' => ['required'],
            'status' => ['required']
        ]);

        $variantItem = new ProductVariantItem();

        $variantItem->product_variant_id = $request->variant_id;
        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;

        $variantItem->save();

        toastr('Variant Item Created Successfully!', 'success');

        return redirect()->route('root.products-variant-item.index', [$request->product_id, $request->variant_id]);
    }

    public function edit(string $variantItemId)
    {
        $variantItem = ProductVariantItem::findOrFail($variantItemId);

        return view('root.product.variant-item.edit', compact('variantItem'));
    }

    public function update(Request $request, string $variantItemId)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'price' => ['required', 'integer'],
            'is_default' => ['required'],
            'status' => ['required']
        ]);

        $variantItem = ProductVariantItem::findOrFail($variantItemId);

        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;

        $variantItem->save();

        toastr('Variant Item Updated Successfully!', 'success');

        return redirect()->route('root.products-variant-item.index', [
            $variantItem->productVariant->product_id,
            $variantItem->product_variant_id
        ]);
    }

    public function destroy(string $variantItemId)
    {
        $variantItem = ProductVariantItem::findOrFail($variantItemId);

        $variantItem->delete();

        return response([
            'status' => 'success',
            'message' => 'Variant Item Deleted Successfully'
        ]);
    }

    public function changeStatus(Request $request)
    {
        $variantItem = ProductVariantItem::findOrFail($request->id);

        $variantItem->status = $request->status == 'true' ? 1 : 0;

        $variantItem->save();

        return response([
            'message' => 'Status has been updated'
        ]);
    }
}
