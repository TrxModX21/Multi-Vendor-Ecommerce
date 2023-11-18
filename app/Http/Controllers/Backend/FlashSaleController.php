<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FlashSaleItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Product;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    public function index(FlashSaleItemDataTable $dataTable)
    {
        $flashSaleDate = FlashSale::first();
        $products = Product::where('is_approved', 1)
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();

        return $dataTable->render('root.flash-sale.index', compact('flashSaleDate', 'products'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'sale_end_date' => ['required']
        ]);

        FlashSale::updateOrCreate(
            ['id' => 1],
            ['sale_end_date' => $request->sale_end_date]
        );

        toastr('Updated Successfully!', 'success');

        return redirect()->back();
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'product' => ['required'],
            'home_status' => ['required'],
            'status' => ['required']
        ]);

        $flashSaleDate = FlashSale::first();

        $flashSaleItem = new FlashSaleItem();

        $flashSaleItem->product_id = $request->product;
        $flashSaleItem->flash_sale_id = $flashSaleDate->id;
        $flashSaleItem->show_at_home = $request->home_status;
        $flashSaleItem->status = $request->status;

        $flashSaleItem->save();

        toastr('Product Add to Flash Sale Successfully!', 'success');

        return redirect()->back();
    }
}

