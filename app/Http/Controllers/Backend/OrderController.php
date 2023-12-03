<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CanceledOrderDataTable;
use App\DataTables\DeliveredOrderDataTable;
use App\DataTables\DroppedOffOrderDataTable;
use App\DataTables\OrderDataTable;
use App\DataTables\OutForDeliveryOrderDataTable;
use App\DataTables\PendingOrderDataTable;
use App\DataTables\ProcessedOrderDataTable;
use App\DataTables\ShippedOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('root.order.index');
    }

    public function pendingOrders(PendingOrderDataTable $dataTable)
    {
        return $dataTable->render('root.order.pending-order');
    }

    public function processedOrders(ProcessedOrderDataTable $dataTable)
    {
        return $dataTable->render('root.order.processed-order');
    }

    public function droppedoffOrders(DroppedOffOrderDataTable $dataTable)
    {
        return $dataTable->render('root.order.droppedoff-order');
    }

    public function shippedOrders(ShippedOrderDataTable $dataTable)
    {
        return $dataTable->render('root.order.shipped-order');
    }

    public function outForDeliveryOrders(OutForDeliveryOrderDataTable $dataTable)
    {
        return $dataTable->render('root.order.out-for-delivery-order');
    }

    public function deliveredOrders(DeliveredOrderDataTable $dataTable)
    {
        return $dataTable->render('root.order.delivered-order');
    }

    public function canceledOrders(CanceledOrderDataTable $dataTable)
    {
        return $dataTable->render('root.order.canceled-order');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);

        return view('root.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);

        $order->orderProducts()->delete();

        $order->transaction()->delete();

        $order->delete();

        return response([
            'status' => 'success',
            'message' => 'Order Deleted Successfully!'
        ]);
    }

    public function changeOrderStatus(Request $request)
    {
        $order = Order::findOrFail($request->id);

        $order->order_status = $request->status;

        $order->save();

        return response([
            'status' => 'success',
            'message' => 'Order Status Updated Successfully!'
        ]);
    }

    public function changePaymentStatus(Request $request)
    {
        $order = Order::findOrFail($request->id);

        $order->payment_status = $request->status;

        $order->save();

        return response([
            'status' => 'success',
            'message' => 'Payment Status Updated Successfully!'
        ]);
    }
}
