<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FlashSaleItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    public function index(FlashSaleItemDataTable $dataTable)
    {
        $flashSaleDate = FlashSale::first();

        return $dataTable->render('root.flash-sale.index', compact('flashSaleDate'));
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
}

