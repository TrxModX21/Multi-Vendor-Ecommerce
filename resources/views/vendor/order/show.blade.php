@php
    $address = json_decode($order->order_address);
@endphp

@extends('vendor.layouts.master')

@section('title')
    {{ $settings->site_name }} || Orders Detail
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i>Order Detail </h3>

                        <section class="invoice-print">
                            <div>
                                <div class="wsus__invoice_area">
                                    <div class="wsus__invoice_header">
                                        <div class="wsus__invoice_content">
                                            <div class="row">
                                                <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                                    <div class="wsus__invoice_single">
                                                        <h5>Billing Information</h5>
                                                        <h6>{{ $address->name }}</h6>
                                                        <p>{{ $address->email }}</p>
                                                        <p>{{ $address->phone }}</p>
                                                        <p>{{ $address->address }}, {{ $address->city }},
                                                            {{ $address->state }}, {{ $address->zip }} </p>
                                                        <p>{{ $address->country }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                                    <div class="wsus__invoice_single text-md-center">
                                                        <h5>shipping information</h5>
                                                        <h6>Name: {{ $address->name }}</h6>
                                                        <p>Email: {{ $address->email }}</p>
                                                        <p>Phone: {{ $address->phone }}</p>
                                                        <p>Address: {{ $address->address }}, {{ $address->city }},
                                                            {{ $address->state }}, {{ $address->zip }} </p>
                                                        <p>Country: {{ $address->country }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-4">
                                                    <div class="wsus__invoice_single text-md-end">
                                                        <h5>Order: #{{ $order->invoice_id }}</h5>
                                                        <h6>Order Status:
                                                            {{ config('order_status.order_status_admin')[$order->order_status]['status'] }}
                                                        </h6>
                                                        <p>Payment Method: {{ $order->payment_method }}</p>
                                                        <p>Payment Status: {{ $order->payment_status }}</p>
                                                        <p>Transaction ID: {{ $order->transaction->transaction_id }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wsus__invoice_description">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th class="name">
                                                            product
                                                        </th>

                                                        <th class="amount">
                                                            Vendor
                                                        </th>

                                                        <th class="amount">
                                                            amount
                                                        </th>

                                                        <th class="quentity">
                                                            Quantity
                                                        </th>
                                                        <th class="total">
                                                            total
                                                        </th>
                                                    </tr>
                                                    @foreach ($order->orderProducts as $product)
                                                        @if ($product->vendor_id === Auth::user()->vendor->id)
                                                            @php
                                                                $variants = json_decode($product->variants);
                                                                $total = 0;
                                                                $total += $product->unit_price * $product->qty;
                                                            @endphp
                                                            <tr>
                                                                <td class="name">
                                                                    <p>{{ $product->product_name }}</p>
                                                                    @foreach ($variants as $key => $item)
                                                                        <span>{{ $key }} :
                                                                            {{ $item->name }}
                                                                            ({{ $settings->currency_icon }}
                                                                            {{ $item->price }})
                                                                        </span>
                                                                    @endforeach
                                                                </td>
                                                                <td class="amount">{{ $product->vendor->shop_name }}</td>

                                                                <td class="amount">
                                                                    {{ $settings->currency_icon }}
                                                                    {{ $product->unit_price }}
                                                                </td>

                                                                <td class="quentity">
                                                                    {{ $product->qty }}
                                                                </td>
                                                                <td class="total">
                                                                    {{ $settings->currency_icon }}
                                                                    {{ $product->unit_price * $product->qty }}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wsus__invoice_footer">
                                        <p><span>Total Amount:</span> {{ $settings->currency_icon }}{{ $total }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="row col-lg-12">
                            <div class="col-md-4">
                                <form action="{{ route('vendor.orders.status', $order->id) }}">
                                    <div class="form-group mt-5">
                                        <label class="mb-2" for="order_status">Order Status</label>
                                        <select name="order_status" id="order_status" class="form-control">
                                            @foreach (config('order_status.order_status_vendor') as $key => $status)
                                                <option {{ $key === $order->order_status ? 'selected' : '' }}
                                                    value="{{ $key }}">
                                                    {{ $status['status'] }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-primary mt-3" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-8">
                                <div class="mt-5 float-end">
                                    <button class="btn btn-warning print_invoice">Print</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.print_invoice').on('click', function() {
                let printBody = $('.invoice-print');
                let originalContents = $('body').html();

                $('body').html(printBody.html());

                window.print();

                $('body').html(originalContents);
            });
        });
    </script>
@endpush
